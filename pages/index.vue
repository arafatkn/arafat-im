<template>
  <Intro />

  <About />

  <Service />

  <Experience />

  <Award />

  <Portfolio />

  <Testimonial />
</template>

<script setup>
useHead({
  title: 'I\'m Arafat!',
});
</script>

<script>
import NavBar from "../components/NavBar";
import Intro from "../components/sections/Intro";
import About from "../components/sections/About";
import Service from "../components/sections/Service";
import Experience from "../components/sections/Experience";
import Award from "../components/sections/Award";
import Portfolio from "../components/sections/Portfolio";
import Testimonial from "../components/sections/Testimonial";
import Contact from "../components/sections/Contact";

export default {
  components: {Contact, Testimonial, Portfolio, Award, Experience, Service, About, Intro, NavBar},
}
</script>
