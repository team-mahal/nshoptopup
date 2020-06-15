<template>
  <card :title="$t('home')">
    {{ $t('you_are_logged_in') }} a b  a sa
  </card>
</template>

<script>
export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
