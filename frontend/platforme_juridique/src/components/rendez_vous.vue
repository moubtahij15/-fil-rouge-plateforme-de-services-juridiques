<template lang="">
    <!-- component -->
<!-- component -->
<div class=" w-full mx-auto my-4 border-b-2 pb-4">	
	<div class="flex pb-3 mx-auto   w-full">
		
		
	
		<div class="flex-1">
			<div class="w-10 h-10 bg-white border-2 hover:bg-primary border-grey-light mx-auto rounded-full text-lg text-white flex items-center">
				<span class="text-primary  hover:text-white1 text-center w-full">1</span>
			</div>
		</div>
		
	
		<div class="w-1/6 align-center items-center align-middle content-center flex">
			<div class="w-full bg-primary rounded items-center align-middle align-center flex-1">
			 	<div class="bg-primary text-xs leading-none py-1 text-center text-primary rounded " ></div>
			</div>
		</div>


		<div class="flex-1">
			<div class="w-10 h-10 bg-white border-2 hover:bg-primary border-grey-light mx-auto rounded-full text-lg text-white flex items-center">
				<span class="text-primary  hover:text-white1 text-center w-full">2</span>
			</div>
		</div>
	
	
		<div class="w-1/6 align-center items-center align-middle content-center flex">
			<div class="w-full bg-primary rounded items-center align-middle align-center flex-1">
			 	<div class="bg-primary text-xs leading-none py-1 text-center text-primary rounded " ></div>
			</div>
		</div>


		<div class="flex-1">
			<div class="w-10 h-10 bg-white border-2 hover:bg-primary border-grey-light mx-auto rounded-full text-lg text-white flex items-center">
				<span class="text-primary  hover:text-white1 text-center w-full">3</span>
			</div>
		</div>
	
	
		<div class="flex-1">
            
		</div>		


        
	</div>


    <!-- step1 horaires -->
	<div class="max-w-xl mt-5  md:mx-auto sm:text-center lg:max-w-xl ">
                <h2
                    class="max-w-lg mb-6 font-sans text-3xl font-medium leading-none tracking-tight text-gray-900 sm:text-3xl md:mx-auto">
            Vos préférences horaires :                
                       
                </h2>
    
        <div class="-my-2 py-2 overflow-x-auto  mx-auto max-w-xl mb-10 sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                <div class="col-lg-12 mt-5">
                                        <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white ">DATE</label>

      <input
        type="text"
        placeholder="date Creneau"
        class="border p-2 rounded w-full"
        onfocus="(this.type = 'date')"
        required
      />
    </div>
                <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                    <table class="mx-auto">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-center leading-4 text-blue-500 tracking-wider">heure</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"></th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"></th>
                               
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider"> choisi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                                
                               <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm leading-5 text-gray-800">#1</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                        <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-primary hover:text-white focus:outline-none">choisie</button>
                                    </td>
                          </tr>
                        </tbody>
                    </table>
                  
	</div>
</div>
            </div>
            <!-- component -->
            


</div>
</template>
<script>
export default {
    name: "Rendez_vous"
}
</script>
<style lang="">
    
</style>