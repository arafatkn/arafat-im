<template>
  <div>

    <Html lang="en-US">
      <Head>
        <Meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      </Head>
    </Html>

<!--    <Preloader />-->

    <!-- desktop header -->
    <header class="desktop-header-3 fixed-top">
      <div class="container">
        <NavBar />
      </div>
    </header>

    <!-- main layout -->
    <main class="content-3">

      <NuxtPage />

      <div class="spacer" data-height="96"></div>

      <footer class="footer">
        <div class="container">
          <span class="copyright">© 2015-22 Arafat Islam</span>
        </div>
      </footer>
    </main>

    <!-- Go to top button -->
    <a href="javaScript:" id="return-to-top"><i class="fas fa-arrow-up"></i></a>

  </div>
</template>

<script setup>
useHead({
  title: 'I\'m Arafat!',
  meta: [
    { name: 'description', content: 'I am Arafat, Full Stack Web Developer having more than 7 years of experience.' }
  ],
  bodyAttrs: {
    //class: 'test'
  },
  link: [
    { rel: 'shortcut icon', type: 'image/x-icon', href: '/assets/images/arafatkn.png' },
    { rel: 'stylesheet', type: 'text/css', href: '/assets/css/simple-line-icons.css', media: 'all' },
    { rel: 'stylesheet', type: 'text/css', href: '/assets/css/slick.css', media: 'all' },
    { rel: 'stylesheet', type: 'text/css', href: '/assets/css/animate.css', media: 'all' },
    { rel: 'stylesheet', type: 'text/css', href: '/assets/css/magnific-popup.css', media: 'all' },
  ],
  script: [
    { type: 'text/javascript', src: '/assets/js/jquery.easing.min.js', defer: true },
    { type: 'text/javascript', src: '/assets/js/jquery.waypoints.min.js', defer: true },
    { type: 'text/javascript', src: '/assets/js/jquery.counterup.min.js', defer: true },
    { type: 'text/javascript', src: '/assets/js/isotope.pkgd.min.js', defer: true },
    { type: 'text/javascript', src: '/assets/js/infinite-scroll.min.js', defer: true },
    { type: 'text/javascript', src: '/assets/js/imagesloaded.pkgd.min.js', defer: true },
    { type: 'text/javascript', src: '/assets/js/slick.min.js', defer: true },
    //{ type: 'text/javascript', src: '/assets/js/contact.js', defer: true },
    //{ type: 'text/javascript', src: '/assets/js/validator.js', defer: true },
    { type: 'text/javascript', src: '/assets/js/wow.min.js', defer: true },
    { type: 'text/javascript', src: '/assets/js/morphext.min.js', defer: true },
    { type: 'text/javascript', src: '/assets/js/jquery.magnific-popup.min.js', defer: true },
    { type: 'text/javascript', src: '/assets/js/custom.js', defer: true },
  ],
})
</script>
<script>
import jQuery from 'jquery';
import * as bootstrap from 'bootstrap';
import * as Popper from 'popper.js';
import Parallax from 'parallax-js';
import 'bootstrap/dist/css/bootstrap.css';
import '/assets/css/all.min.css';
import '/assets/css/style.css';
import NavBar from "./components/NavBar";

export default {
  components: {NavBar},

  mounted() {
    window.$ = window.jQuery = jQuery;
    window.bootstrap = bootstrap;
    window.Popper = Popper;
    window.Parallax = Parallax;
  },
}
</script>
