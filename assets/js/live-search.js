// Live Search Script
jQuery(document).ready(function ($) {
  var $input = $("#searchInput");
  var $suggestions = $("#searchSuggestions");
  var $suggestionsList = $("#suggestionsList");
  var $form = $(".search-section__form");
  var searchTimer = null;

  // Submit form on Enter => go to results page with ?q=
  $form.on("submit", function (e) {
    var term = $input.val().trim();
    if (term.length < 1) {
      e.preventDefault();
      return;
    }
    // Let the form submit naturally with ?q=term
  });

  // Live search on input
  $input.on("input", function () {
    var term = $(this).val().trim();

    if (searchTimer) clearTimeout(searchTimer);

    if (term.length < 2) {
      $suggestions.hide();
      $suggestionsList.empty();
      return;
    }

    searchTimer = setTimeout(function () {
      $.ajax({
        url: gavSearch.ajax_url,
        type: "GET",
        dataType: "json",
        data: {
          action: "gav_live_search",
          nonce: gavSearch.nonce,
          term: term,
        },
        success: function (response) {
          if (response.success && response.data && response.data.length > 0) {
            $suggestionsList.empty();

            $.each(response.data, function (i, item) {
              var highlightedTitle = highlightMatch(item.title, term);
              var highlightedExcerpt = highlightMatch(item.excerpt, term);
              var displayText = highlightedTitle;

              if (highlightedExcerpt) {
                displayText += " &ndash; " + highlightedExcerpt;
              }

              var li =
                '<li>' +
                  '<a href="' + escHtml(item.url) + '">' +
                    '<span class="suggestion-icon">' +
                      '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>' +
                    '</span>' +
                    '<span class="suggestion-content">' +
                      '<span class="suggestion-text">' + displayText + '</span>' +
                      (item.type ? '<span class="suggestion-type">' + escHtml(item.type) + '</span>' : '') +
                    '</span>' +
                  '</a>' +
                '</li>';

              $suggestionsList.append(li);
            });

            $suggestions.show();
          } else {
            $suggestions.hide();
            $suggestionsList.empty();
          }
        },
        error: function () {
          $suggestions.hide();
        },
      });
    }, 300);
  });

  // Highlight matching term in text
  function highlightMatch(text, term) {
    if (!text) return "";
    var escaped = term.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
    var regex = new RegExp("(" + escaped + ")", "gi");
    return text.replace(regex, "<strong>$1</strong>");
  }

  // Minimal HTML escaping for URLs
  function escHtml(str) {
    if (!str) return "";
    return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
  }
});
