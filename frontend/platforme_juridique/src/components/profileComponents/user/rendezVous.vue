<template lang="">
    
       
        <!-- alert 1h before -->
     <div class="block w-full overflow-x-auto">
          <div class="w-full text-white bg-tahiti">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex">
                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>

                <p class="mx-3">vous pouvez annuler  votre rendez-vous (d'une limite 1 h avant le rendez-vous).​</p>
            </div>

            <button class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </div>
        <!-- table rdv -->
     <!-- component -->
<section class="container mx-auto p-6 font-mono">
  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full border-white">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-centre text-gray-900 bg-white border-b uppercase ">
            <th class="px-4 py-3">avocat </th>
            <th class="px-4 py-3 ">specialté</th>
            <th class="px-4 py-3">sujet</th>
            <th class="px-4 py-3">annuler</th>
          </tr>
        </thead>
        <tbody class="bg-white1">
         
          
         
         
             <tr class="text-gray-700 border-white border-b-2">
            <td class="px-4 py-3  text-center ">
             
                  <p class="font-semibold">Mohammed</p>
               
            </td>
            <td class="px-4 py-3 text-left text-md font-semibold text-center">38</td>
            <td class="px-4 py-3  text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
            </td>
            <td class="px-4 py-3  text-sm">
                      <button   class="flex-no-shrink   px-5  py-2 text-xs shadow-sm hover:shadow-lg font-bold tracking-wider border-2  hover:bg-red hover:text-white   text-primary rounded-full transition ease-in duration-300">annuler</button>           

            </td>
          </tr>
            <tr class="text-gray-700 border-white border-b-2">
            <td class="px-4 py-3  text-center ">
             
                  <p class="font-semibold">Mohammed</p>
               
            </td>
            <td class="px-4 py-3 text-left text-md font-semibold text-center">38</td>
            <td class="px-4 py-3  text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm text-center"> Acceptable </span>
            </td>
            <td class="px-4 py-3  text-sm text-center">
                      <button   class="flex-no-shrink   px-5  py-2 text-xs shadow-sm hover:shadow-lg font-bold tracking-wider border-2  hover:bg-red hover:text-white   text-primary rounded-full transition ease-in duration-300">annuler</button>           

            </td>
          </tr>
        
        </tbody>
      </table>
    </div>
    
  </div>
</section>
    </div>


</template>
<script>
export default {
    name: "rdvUser"
}
</script>
<style lang="">
    
</style>