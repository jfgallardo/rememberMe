<template>
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">{{ title }}</h1>
      <slot name="header"></slot>
    </div>
  </header>
  <main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <!-- Replace with your content -->
      <div class="px-4 py-6 sm:px-0">
        <slot></slot>
      </div>
      <!-- /End replace -->
    </div>
  </main>
</template>

<script>
export default {
  props: {
    title: String,
  },
  setup() {
    return {
      
    };
  },
};
</script>

<style lang="scss" scoped></style>
