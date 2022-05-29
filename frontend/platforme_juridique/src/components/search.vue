<template lang="">
   <div
                        class="w-full mx-auto   flex items-center  justify-center  rounded-md p-4  bg-white">

                        <div class="flex gap-2 flex-col  mx-auto  md:flex-row center wid">
                            <div class="relative flex-1">
                                <input id="departure" value="" name="departure" type="text"
                                    class=" peer h-10 w-full border border-1.5 rounded-md border-primary-300 text-primary-900 placeholder-transparent focus:outline-none focus:border-b-600 focus:border-2 p-3"
                                    placeholder=" " />
                                <label for="departure"
                                    class="absolute left-2 px-1 -top-2.5 bg-white text-primary text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-900 peer-placeholder-shown:top-2 peer-focus:-top-2.5 peer-focus:text-blue-600 peer-focus:text-sm">avocat?
                                    :</label>
                                <div class="absolute right-0 top-0 mt-2 mr-2">

                                </div>
                            </div>
                            <div class="relative self-center">

                            </div>
                            <div class="relative flex-1">
                                <select class="border p-2 rounded w-full">
                                    <option>Round-trip</option>
                                    <option>Missouri</option>
                                    <option>texas</option>
                                </select>
                            </div>
                            <div></div>
                            <div class="relative flex-1">
                                <select class="border p-2 rounded w-full">
                                    <option>Round-trip</option>
                                    <option>Missouri</option>
                                    <option>texas</option>
                                </select>


                            </div>
                            <div class=" relative flex-1  ">
                                <button
                                    class="bg-white py-3 px-5 text-primary font-semibold rounded-lg hover:shadow-lg  transition duration-3000 cursor-pointer">Rechercher</button>
                            </div>
                        </div>


                    </div>
</template>
<script>
export default {
    name: search
}
</script>
<style lang="">
    
</style>