<template lang="">
  <!-- component -->
  <!-- component -->
  <div class="w-full mx-auto my-4 border-b-2 pb-4">
    <section
      class="container mx-auto p-6 font-mono"
    >
      <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
          <table class="w-full border-white">
            <thead>
              <tr
                class="text-md font-semibold tracking-wide text-centre text-gray-900 bg-white border-b uppercase"
              >
                <th class="px-4 py-3">avocat</th>
                <th class="px-4 py-3">catégorie</th>
                
                <th class="px-4 py-3">montant</th>
                <th class="px-4 py-3">valdé</th>
              </tr>
            </thead>
            <tbody class="bg-white1">
              <tr
                class="text-gray-700 border-white border-b-2"
                v-for="elem in this.consultations"
              >
                <td class="px-4 py-3 text-center">
                  <p class="font-semibold">{{ elem.nom }} {{ elem.prenom }}</p>
                </td>

                <td
                  class="px-4 py-3 text-left text-md font-semibold text-center cursor-pointer"
                >
                  {{ elem.sujet }}
                </td>
                

                
              
               
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                  >
                    {{ elem.prix }}DH
                  </span>
                </td>

                <td class="px-4 py-3 text-sm">
                  <button
                    @click=""
                    class="flex-no-shrink px-5 py-2 text-xs shadow-sm hover:shadow-lg font-bold tracking-wider border-2 hover:bg-primary hover:text-white text-primary rounded-full transition ease-in duration-300"
                  >
                    VOIR
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
</template>
<script></script>
<style lang=""></style>
