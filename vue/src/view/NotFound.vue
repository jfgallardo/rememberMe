<template>
  <div>
    <section class="bg-primary py-[120px] relative z-10">
      <div class="container">
        <div class="flex -mx-4">
          <div class="w-full px-4">
            <div class="mx-auto max-w-[400px] text-center">
              <h2
                class="font-bold mb-2 text-[50px] sm:text-[80px] md:text-[100px] leading-none"
              >
                404
              </h2>
              <h4
                class="font-semibold text-[22px] leading-tight mb-3"
              >
                Oops! That page can’t be found
              </h4>
              <p class="text-lg mb-8">
                The page you are looking for it maybe deleted
              </p>
              <router-link
                :to="{name: 'Dashboard'}"
                class="text-base font-semibold bg-emerald-500 inline-block text-center rounded-full px-8 py-3 hover:bg-emerald-600 shadow-lg shadow-cyan-500/50"
              >
                Go To Dashboard
              </router-link>
            </div>
          </div>
        </div>
      </div>
      <div
        class="absolute -z-10 w-full h-full top-0 left-0 flex justify-between items-center space-x-5 md:space-x-8 lg:space-x-14"
      >
        <div
          class="w-1/3 h-full bg-gradient-to-t from-[#FFFFFF14] to-[#C4C4C400]"
        ></div>
        <div class="w-1/3 h-full flex">
          <div
            class="w-1/2 h-full bg-gradient-to-b from-[#FFFFFF14] to-[#C4C4C400]"
          ></div>
          <div
            class="w-1/2 h-full bg-gradient-to-t from-[#FFFFFF14] to-[#C4C4C400]"
          ></div>
        </div>
        <div
          class="w-1/3 h-full bg-gradient-to-b from-[#FFFFFF14] to-[#C4C4C400]"
        ></div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  setup() {
    return {};
  },
};
</script>

<style scoped></style>
