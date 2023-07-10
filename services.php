<?php
require_once(__DIR__ . '/configuration.php');

include(__DIR__ . '/includes/head.inc.php');
?>

<body>
  <a href="#main" class="skip-nav-link">Skip to main content</a>
  <header>
    <?php include(__DIR__ . '/includes/navigation.inc.php'); ?>
    <section>
      <p class="hero-text-1">A unique partner for <br>unique projects.</p>
      <p class="hero-text-2">We love small projects with passion as much as complex platforms. Regardless of the project
        dimension, we are happy to advise you.</p>
      <div class="title-section">
        <h1>Explore our services</h1>
        <button class="services-navigation" aria-label="Open services navigation"><img src="assets/icons/filter_icon.svg" alt="" height="35" width="30"></button>
      </div>
      <div class="services-nav">
        <ul class="services-nav">
          <li><a href="#web-design">Web design</a></li>
          <li><a href="#development">Development</a></li>
          <li><a href="#branding">Branding</a></li>
          <li><a href="#seo-sea">SEO & SEA<br>optimization</a></li>
          <li><a href="#cms">CMS</a></li>
          <li><a href="#support">Support</a></li>
        </ul>
      </div>
      <hr class="title">
    </section>
  </header>

  <main id="main">
    <div class="service">
      <div class="ux-ui-icon service-icon">UX/UI</div>
      <hr class="parting-line">
      <h2 id="web-design">Web design</h2>
      <p class="service-text">We accompany you as an entrepreneur or on the way to your successful redesign/relaunch!
      </p>
      <button class="drop-down-icon" aria-label="Learn more about our web design services"><img src="assets/icons/drop-down_icon.svg" width="50" height="40" alt=""></button>
      <div class="service-article hidden">
        <div class="article-webdesign">
          <div class="category">
            <img src="assets/icons/wings_icon.svg" width="50" height="50" alt="" class="wings">
            <h3 class="individual-concept">Individual concept</h3>
            <p class="category">We develop an individual concept based on research of the needs of your customers.</p>
          </div>
          <div class="category">
            <img src="assets/icons/wings_icon.svg" width="50" height="50" alt="" class="wings">
            <h3 class="ux-ui">User experience and interface</h3>
            <p class="category">With well-thought-out web design, we create a well comprehensible and user-oriented
              website. A perfect symbiosis between functionality and aesthetics.</p>
          </div>
          <div class="category">
            <img src="assets/icons/wings_icon.svg" width="50" height="50" alt="" class="wings">
            <h3 class="ucd">User centered design testing</h3>
            <p class="category">To ensure that the design and information architecture work as expected, we conduct
              various tests.</p>
          </div>
          <div class="category">
            <img src="assets/icons/wings_icon.svg" width="50" height="50" alt="" class="wings">
            <h3 class="responsive">Responsive web design</h3>
            <p class="category">We optimize for different terminals and screen sizes.</p>
          </div>
          <div class="category">
            <img src="assets/icons/wings_icon.svg" width="50" height="50" alt="" class="wings">
            <h3 class="content-creation">Content creation</h3>
            <p class="category">On request, we create content for the websites with our partners.</p>
          </div>
          <div class="category">
            <img src="assets/icons/wings_icon.svg" width="50" height="50" alt="" class="wings">
            <h3 class="prototype">Prototype</h3>
            <p class="category">Before the technical implementation, the prototype is tested on various terminals.</p>
          </div>
        </div>
        <a href="contact" class="button-get-in-touch">GET IN TOUCH</a>
      </div>
    </div>

    <div class="service">
      <img src="assets/icons/development_icon.svg" width="50" height="50" alt="" class="service-icon">
      <hr class="parting-line">
      <h2 id="development">Development</h2>
      <p class="service-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur tempora quibusdam
        ipsum! Consequuntur, quis placeat.</p>
      <button class="drop-down-icon" aria-label="Learn more about our development services"><img src="assets/icons/drop-down_icon.svg" width="30" height="20" alt=""></button>
    </div>


    <div class="service">
      <img src="assets/icons/branding_icon.svg" width="50" height="50" alt="" class="service-icon">
      <hr class="parting-line">
      <h2 id="branding">Branding</h2>
      <p class="service-text">Together we'll find your USP's that we focus on and with which we design/redesign your
        online visual identity to align with your products/services and brand values.</p>
      <button class="drop-down-icon" aria-label="Learn more about our branding services"><img src="assets/icons/drop-down_icon.svg" width="30" height="20" alt=""></button>
      <div class="service-article hidden">
        <div class="article-branding">
          <div class="category">
            <h3 class="branding">Brand analysis</h3>
            <hr>
            <p>The process to review and refine your company's
              current brand to later change or build
              perceptions. To understand your brand and
              customers/users better these might be a few of
              the included elements:
              <br>&bull; Company summary
              <br>&bull; Branding goals
              <br>&bull; Objectives
              <br>&bull; Objective results
              <br>&bull; Internal feedback
              <br>&bull; Customer feedback
              <br>&bull; Competition
              <br>&bull; Market analysis
            </p>
          </div>
          <div class="category">
            <h3 class="branding">Brand strategy</h3>
            <hr>
            <p>For a sustainable brand identity, we use long-term
              planning of goals to communicate your corporate identity
              in the best possible way - both in print media and on the
              Internet.
              Our goal is to create a brand that is unique, authentic, and powerful.
              Using the analysis we make a strategy tailored to your company, to help reach your goals.</p>
          </div>
          <div class="category">
            <h3 class="branding">Logo design</h3>
            <hr>
            <p>A logo that communicates your brand. <br>Unique. Functional. Brand reflecting.</p>
          </div>
          <div class="category">
            <h3 class="branding">Corporate identity design</h3>
            <hr>
            <p>Corporate identity is the manner in which
              your business presents itself to the public,
              containing font, images, style consistency,
              and other visual elements. <br><br>We create a custom manual with all brand guidelines of your brand
              strategy. For more brand awareness and a stronger identity.</p>
          </div>
          <div class="category">
            <h3 class="branding">Rebranding</h3>
            <hr>
            <p>You already have a brand but are not
              satisfied? We'll take a look at your
              options. Even small changes can make
              a big difference.</p>
          </div>
        </div>
        <a href="contact" class="button-get-in-touch">GET IN TOUCH</a>
      </div>
    </div>


    <div class="service">
      <img src="assets/icons/seo_optimization_icon.svg" width="50" height="50" alt="" class="service-icon">
      <hr class="parting-line">
      <h2 id="seo-sea">SEO & SEA optimization</h2>
      <p class="service-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit perspiciatis sit veritatis
        aut, commodi quia.</p>
      <button class="drop-down-icon" aria-label="Learn more about our SEO and SEA optimization services"><img src="assets/icons/drop-down_icon.svg" width="30" height="20" alt=""></button>
    </div>


    <div class="service">
      <img src="assets/icons/cms_icon.svg" width="50" height="50" alt="" class="service-icon">
      <hr class="parting-line">
      <h2 id="cms">CMS</h2>
      <p class="service-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate deserunt omnis earum
        modi fugit quia?</p>
      <button class="drop-down-icon" aria-label="Learn more about our content management system services"><img src="assets/icons/drop-down_icon.svg" width="30" height="20" alt=""></button>
    </div>


    <div class="service">
      <img src="assets/icons/support_icon.svg" width="50" height="50" alt="" class="service-icon">
      <hr class="parting-line">
      <h2 id="support">Support</h2>
      <p class="service-text">Do you need help with technical problems with your website or our support with maintaining
        the site? Do you have any questions about your CMS, updates, or general questions? <br>Get support now!</p>
      <div class="mail">
        <a href="mailto:alandra.villalaz@gmail.com" class="mail-icon" aria-label="Send us an email">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 97.51 69.2">
            <path stroke="#000" stroke-miterlimit="10" stroke-width="3" d="M10.23 62.27c.93.45 1.98.71 3.09.71h70.87c1.11 0 2.15-.25 3.09-.71L59.36 35.99l-9.1 7.5c-.87.72-2.13.72-3 0l-9.1-7.5-27.93 26.28Zm-3.32-3.36.07-.07 27.5-25.88L7.09 10.41c-.06-.05-.12-.1-.17-.15-.44.93-.69 1.96-.69 3.06v42.57c0 1.08.24 2.11.68 3.03Zm83.7 0c.43-.92.68-1.94.68-3.03V13.31c0-1.09-.25-2.13-.69-3.06-.05.05-.11.11-.17.15L63.05 32.95l27.5 25.88s.05.04.07.07Zm-3.37-52a7.07 7.07 0 0 0-3.05-.69H13.31c-1.09 0-2.12.25-3.05.69L48.74 38.6l38.5-31.69ZM13.31 1.5h70.88C90.71 1.5 96 6.79 96 13.31v42.58c0 6.52-5.29 11.81-11.81 11.81H13.31C6.79 67.7 1.5 62.41 1.5 55.89V13.31C1.5 6.79 6.79 1.5 13.31 1.5Z" />
          </svg>
        </a>
        <a href="mailto:alandra.villalaz@gmail.com" class="mail-address" aria-label="Send us an email">alandra.villalaz@gmail.com</a>
      </div>

    </div>


    <hr class="services-end">
    <a href="contact" class="get-in-touch-button">GET IN TOUCH</a>

  </main>
  <?php include(__DIR__ . '/includes/footer.inc.php'); ?>