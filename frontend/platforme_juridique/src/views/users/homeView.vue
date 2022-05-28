<template>
    <div class=" bg-white">
        <!-- start header -->

        <section class=" overflow-hidden">



            <!-- Background Layer -->
            <!-- <div class="absolute z-10 w-screen h-full bg-gradient-to-tr from-gray-900 via-gray-900 to-black">
                <div class="absolute right-0 w-32 h-full -mr-20 transform bg-white bg-opacity-25 opacity-10 rotate-6">
                </div>
            </div> -->

            <!-- End Background Layer -->



            <div class="   bg-white  z-30 flex flex-col px-10 pt-10 pb-20 mx-auto md:flex-row  max-w-7xl">

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
        <!-- start section services -->
        <section class="w-full bg-white pb-7 md:pb-24">
            <div class="max-w-xl  md:mx-auto sm:text-center lg:max-w-2xl ">
                <h2
                    class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                    <span class="relative inline-block">
                        <svg viewBox="0 0 52 24" fill="currentColor"
                            class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                            <defs>
                                <pattern id="df31b9f6-a505-42f8-af91-d2b7c3218e5c" x="0" y="0" width=".135"
                                    height=".30">
                                    <circle cx="1" cy="1" r=".7"></circle>
                                </pattern>
                                
                            </defs>
                            <rect fill="url(#df31b9f6-a505-42f8-af91-d2b7c3218e5c)" width="52" height="24"></rect>
                        </svg>
                        <span class="relative">Notre</span>
                    </span>
                    services :
                </h2>

            </div>
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
        <!-- end section services -->
        <!-- start section counter card -->
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
                <h2
                    class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                    <span class="relative inline-block">
                        <svg viewBox="0 0 52 24" fill="currentColor"
                            class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                            <defs>
                                <pattern id="df31b9f6-a505-42f8-af91-d2b7c3218e5c" x="0" y="0" width=".135"
                                    height=".30">
                                    <circle cx="1" cy="1" r=".7"></circle>
                                </pattern>
                            </defs>
                            <rect fill="url(#df31b9f6-a505-42f8-af91-d2b7c3218e5c)" width="52" height="24"></rect>
                        </svg>
                        <span class="relative">Plus</span>
                    </span>
                    de 1.000 clients nous ont déjà fait confiance
                </h2>

                <p class="text-base text-gray-700 md:text-lg">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque rem aperiam,
                    eaque ipsa quae.
                </p>
            </div>

            <div class="grid gap-8 row-gap-8 lg:grid-cols-4">
                <div class="sm:text-center">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50 mx-auto sm:w-24 sm:h-24">
                        <img src="../../assets/1law.svg" class="w-12 h-12 text-deep-purple-accent-400 sm:w-20 sm:h-20"
                            stroke="currentColor" />
                    </div>
                    <h6 class="mb-2 font-semibold leading-5">1,000+
                    </h6>

                    <p
                        class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
                        Cabinets
                        d'Avocats inscrits

                    </p>
                </div>
                <div class="sm:text-center">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50 mx-auto sm:w-24 sm:h-24">
                        <img src="../../assets/map2.svg" class="w-12 h-12 text-deep-purple-accent-400 sm:w-20 sm:h-20"
                            stroke="currentColor" />
                    </div>
                    <h6 class="mb-2 font-semibold leading-5">44+</h6>

                    <p href="/" aria-label=""
                        class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
                        Villes
                        du Royaume

                    </p>
                </div>
                <div class="sm:text-center">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50 mx-auto sm:w-24 sm:h-24">
                        <img src="../../assets/accord3.svg"
                            class="w-12 h-12 text-deep-purple-accent-400 sm:w-20 sm:h-20" stroke="currentColor" />
                    </div>
                    <h6 class="mb-2 font-semibold leading-5">1220+</h6>

                    <a href="/" aria-label=""
                        class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
                        Clients accompagnés


                    </a>
                </div>
                <div class="sm:text-center">
                    <div
                        class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50 mx-auto sm:w-24 sm:h-24">
                        <img src="../../assets/4.svg" class="w-12 h-12 text-deep-purple-accent-400 sm:w-20 sm:h-20"
                            stroke="currentColor" />
                    </div>
                    <h6 class="mb-2 font-semibold leading-5">98%

                    </h6>

                    <p href="/" aria-label=""
                        class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
                        Taux de satisfaction client

                    </p>


                </div>
            </div>
        </div>

        <!-- end section counter card -->
        <!-- start footer -->
            <Footer/>
    </div>
    <!-- end footer -->

</template>
<script>
import Footer from '../../components/footer/footer.vue'
export default {
    name: "homeView",

   components: {
    Footer
},
}

</script>
