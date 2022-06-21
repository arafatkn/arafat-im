<template>
  <section id="experience">
    <div class="container">

      <h2 class="section-title wow fadeInUp">Experience</h2>
      <div class="spacer" data-height="60"></div>
      <div class="row">
        <div class="col-md-6">

          <div class="timeline edu bg-white rounded shadow-dark padding-30 overflow-hidden">

            <div v-for="(edu, index) in educations" :key="index" class="timeline-container wow fadeInUp">
              <div class="content">
                <span class="time">{{ edu.time }}</span>
                <h3 class="title">{{ edu.title }}</h3>
                <p>{{ edu.institute }}</p>
              </div>
            </div>

            <span class="line"></span>
          </div>
        </div>
        <div class="col-md-6">

          <div class="spacer d-md-none d-lg-none" data-height="30"></div>

          <div class="timeline exp bg-white rounded shadow-dark padding-30 overflow-hidden">

            <div v-for="(work, index) in works" :key="index" class="timeline-container wow fadeInUp">
              <div class="content">
                <span class="time">{{ work.time }}</span>
                <h3 class="title">{{ work.title }}</h3>
                <p>{{ work.company }}</p>
                <p class="small">{{ work.details }}</p>
                <p v-if="work.skills" class="small" style="font-weight: bold">Skills: {{ work.skills }}</p>
              </div>
            </div>

            <span class="line"></span>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  setup () {
    return {
      educations: [
        {
          title: 'M.Sc. (Engineering) in Computer Science and Engineering',
          time: '2022 - Running',
          institute: 'Bangladesh University of Engineering and Technology (BUET), Dhaka',
        },
        {
          title: 'B.Sc. (Engineering) in Computer Science and Engineering',
          time: '2015 - 2019',
          institute: 'Pabna University of Science and Technology (PUST), Pabna',
        },
        {
          title: 'HSC (Science)',
          time: '2014',
          institute: 'Major General Mahmudul Hasan Ideal College, Tangail',
        },
        {
          title: 'SSC (Science)',
          time: '2012',
          institute: 'Bindubashini Govt. Boys High School, Tangail',
        },
      ],

      works: [
        {
          time: 'Jan 2022 - Jun 2022',
          title: 'Laravel Engineer',
          company: 'rtCamp Inc. (Remote)',
          details: 'Worked on a Laravel & ReactJS project and later worked on Easydash as a Backend developer (NestJS).Worked on a Laravel & ReactJS project and later worked on Easydash as a Backend developer (NestJS).',
          skills: 'Laravel · ReactJS · NestJS · WordPress',
        },
        {
          time: 'Mar 2021 - Dec 2021',
          title: 'Software Engineer',
          company: 'weDevs Ltd.',
          details: 'Worked in a microservices architecture based saas project named Appsero. Appsero is a brilliant tool for Analytics, Software Licensing, Automatic Updates, Deactivation autoresponder, Email list building – everything in one place.',
          skills: 'Laravel · VueJS · Express.js · Python · MySQL · MongoDB · Google Datastore · BigQuery',
        },
        {
          time: 'March 2015 - Feb 2021',
          title: 'Full Stack Developer (Freelance)',
          company: 'Laravel, VueJS, PHP, WordPress',
        },
      ],
    };
  },
}
</script>