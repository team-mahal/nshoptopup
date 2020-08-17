<template>
<div>
    <Navbar />
      <div class="main-layout">
        <div class="mt-4">
          <child />
        </div>
      </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'
import Footer from '~/components/Footer'

export default {
  name: 'MainLayout',

  components: {
    Navbar,
    Footer
  }
}
</script>
