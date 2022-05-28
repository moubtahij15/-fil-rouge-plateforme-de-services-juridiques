<template>
    <div>
        <!-- start header -->

        <section class="relative overflow-hidden">



            <!-- Background Layer -->
            <!-- <div class="absolute z-10 w-screen h-full bg-gradient-to-tr from-gray-900 via-gray-900 to-black">
                <div class="absolute right-0 w-32 h-full -mr-20 transform bg-white bg-opacity-25 opacity-10 rotate-6">
                </div>
            </div> -->

            <!-- End Background Layer -->



            <div class="relative z-30 flex flex-col px-10 pt-10 pb-20 mx-auto md:flex-row  max-w-7xl">
                <div class="flex flex-col items-center  justify-center w-full space-y-8 md:w-1/2 sm:pr-8">
                    <h1 class="text-5xl font-extrabold leading-tight sm:text-6xl md:text-6xl ">Trouvez un
                        avocat simplement
                    </h1>
                    <p class="text-xl text-blue-200">Nous offrons toutes les réponses à vos questions juridiques,
                        rédigées par de vrais avocats.</p>

                    <div
                        class="w-full mx-auto shadow-md  flex items-center  justify-center  rounded-md p-4 pt-10 bg-white">

                        <div class="flex gap-2 flex-col  mx-auto  md:flex-row center wid">
                            <div class="relative flex-1">
                                <input id="departure" value="" name="departure" type="text"
                                    class=" peer h-10 w-full border border-1.5 rounded-md border-primary-300 text-primary-900 placeholder-transparent focus:outline-none focus:border-b-600 focus:border-2 p-3"
                                    placeholder=" " />
                                <label for="departure"
                                    class="absolute left-2 px-1 -top-2.5 bg-white text-primary text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-900 peer-placeholder-shown:top-2 peer-focus:-top-2.5 peer-focus:text-blue-600 peer-focus:text-sm">Départ
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
                </div>

                <!-- <div class="relative z-0 w-full  mt-8 lg:w-1/2 ">
                    <img src="../../assets/Law.svg"
                        class="transform xl:translate-x-20 lg:ml-0 lg:translate-y-20 lg:scale-125  h-1/2 ">
                </div> -->
                <div class="relative flex-1 w-full pt-6 text-black lg:pt-12 lg:pl-12 lg:w-6/12 ">
                    <!-- Start of Image -->
                    <img src="../../assets/Law.svg" class="w-full">
                    <!-- End of Image -->
                </div>
            </div>




        </section>

        <!-- end header -->
        <section class="w-full bg-white pb-7 md:pb-24">
            <div
                class="box-border flex flex-col items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">

                <!-- Image -->
                <div
                    class="  box-border relative w-full max-w-md px-4 mt-5 mb-4  -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10">
                    <img src="../../assets/Calendarsvg.svg" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20   ">
                </div>

                <!-- Content -->
                <div
                    class="  pt-5 cursor-pointer   shadow-md rounded-md hover:shadow-2xl   hover:mb-10 order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
                    <h2
                        class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl   ">
                        Prendre Rendez-vous <br> chez un Avocat
                    </h2>
                    <p class=" pt-4  pb-8  leading-7 text-gray-700 border-0 border-gray-300 sm:pr-10 lg:text-lg">
                        Prenez rendez-vous au cabinet d'un avocat près de chez vous et obtenez des informations sur la
                        manière de traiter votre problème </p>

                </div>
                <!-- End  Content -->
            </div>
            <div
                class=" box-border flex flex-col items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:mt-20 xl:mt-0 md:flex-row max-w-7xl lg:px-16">

                <!-- Content -->
                <div
                    class="   pt-5 cursor-pointer   shadow-md rounded-md hover:shadow-2xl   hover:mb-10 order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
                    <h2
                        class="m-0 text-xl  font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                        Télécharger ou rédiger <br> un document juridique
                    </h2>
                    <p class="pt-4  pb-8  leading-7 text-gray-700 border-0 border-gray-300 sm:pr-10 lg:text-lg">
                        Télécharger ou rédiger un document juridique d'une manière simple et plus vite </p>

                </div>
                <!-- End  Content -->

                <!-- Image -->
                <div
                    class="  box-border relative w-full max-w-md px-4 mt-10 mb-4 text-center bg-no-repeat bg-contain border-solid md:mt-0 md:max-w-none lg:mb-0 md:w-1/2">
                    <img src="../../assets/document.svg " class="pl-4 sm:pr-10 xl:pl-10 lg:pr-32">
                </div>

            </div>
            <div
                class="box-border flex flex-col items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">

                <!-- Image -->
                <div
                    class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10">
                    <img src="../../assets/adistance.svg" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20 ">
                </div>

                <!-- Content -->
                <div
                    class=" pt-5 cursor-pointer  hover:mb-10   shadow-md rounded-md hover:shadow-2xl box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
                    <h2
                        class=" m-0 text-xl  font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
                        Consulter un Avocat <br> à distance
                    </h2>
                    <p class="pt-4  pb-8  leading-7 text-gray-700 border-0 border-gray-300 sm:pr-10 lg:text-lg">
                        Consultez un avocat sans vous déplacer depuis votre smartphone ou votre ordinateur </p>

                </div>
                <!-- End  Content -->
            </div>


        </section>
    </div>
</template>
<script>
export default {
    name: "homeView"
}

</script>
