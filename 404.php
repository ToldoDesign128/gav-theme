<?php
/*
  *
  * Template Name: 404
  *
  */
get_header(); ?>

<body <?php body_class(); ?>>

  <main class="error">

    <section class="error__content container">
      <div class="error__content__info">
        <h1>Ops!<br>Pagina non trovata.</h1>
        <p>Sembra che la pagina che stai cercando non esista o sia stata spostata.</p>
        <a href="<?php echo home_url(); ?>" class="primary-btn">Torna alla HOME</a>
      </div>
      <div class="error__content__image">
        <svg width="570" height="613" viewBox="0 0 570 613" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M401.294 292.078C401.294 239.67 358.809 197.184 306.399 197.184C253.991 197.184 211.505 239.67 211.505 292.078C211.505 344.488 253.991 386.973 306.399 386.973C358.809 386.973 401.294 344.488 401.294 292.078ZM306.399 168.715C374.531 168.715 429.763 223.947 429.763 292.078C429.763 360.21 374.531 415.442 306.399 415.442C277.462 415.442 250.852 405.479 229.812 388.796L169.378 449.23C163.819 454.789 154.806 454.789 149.247 449.23C143.688 443.671 143.688 434.659 149.247 429.1L209.683 368.665C192.999 347.625 183.036 321.015 183.036 292.078C183.036 223.947 238.268 168.715 306.399 168.715Z" fill="#545454" />
          <path d="M503.871 507.451V318.805L523.416 327.69L432.204 452.664L428.354 432.23H563.101V464.806H406.734V433.414L503.871 300.148H537.928V507.451H503.871Z" fill="#545454" />
          <path d="M102.171 276.908V88.2632L121.717 97.1472L30.5038 222.121L26.6538 201.687H161.401V234.264H5.03516V202.871L102.171 69.606H136.228V276.908H102.171Z" fill="#545454" />
        </svg>
      </div>
    </section>

  </main>

  <?php get_footer(); ?>