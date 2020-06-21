<template>
<div>
    <navbar />
      <div class="main-layout container mx-auto">
        <div class="mt-4">
          <child />
        </div>
      </div>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'MainLayout',

  components: {
    Navbar
  }
}
</script>
