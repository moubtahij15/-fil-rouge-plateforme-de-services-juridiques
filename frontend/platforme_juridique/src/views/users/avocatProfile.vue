<template lang="">


<div class="bg-gray-100">

    <!-- End of Navbar -->

    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                            alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Jane Doe</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">Owner at Her Company Inc.</h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit.
                        Reprehenderit, eligendi dolorum sequi illum qui unde aspernatur non deserunt</p>
                   
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
               
                <!-- End of friends card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Prenom</div>
                                <div class="px-4 py-2">Jane</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nom</div>
                                <div class="px-4 py-2">Doe</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">sexe</div>
                                <div class="px-4 py-2">Female</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact </div>
                                <div class="px-4 py-2">+11 998001001</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold"> Address</div>
                                <div class="px-4 py-2">Beech Creek, PA, Pennsylvania</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">Arlington Heights, IL, Illinois</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Avocat au Barreau</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:jane@example.com">jane@example.com</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Age</div>
                                <div class="px-4 py-2">Feb 06, 1998</div>
                            </div>
                        </div>
                    </div>
                
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->

                   
                      <div class="w-full  px-7 py-10 mx-auto bg-white rounded-2xl shadow-xl">
			<!-- Navigation Bar -->
			<div class="px-5 pt-3 bg-white shadow-lg rounded-2xl">
				<div class="flex flex-row space-x-3">
					<!-- Item #1 -->
					<div class="flex group">
						<a href="#" class="p-3 text-gray-400 hover:text-yellow-500">
							<span class="flex flex-col items-center">
								<!-- Icon -->
								<i class="mdi mdi-home-outline mdi-24px mx-1 text-gray-500 group-hover:text-gray-700
									transition-color duration-200"></i>

								<!-- Text -->
								<span class="text-xs mb-2 transition-all duration-200">
									Home
								</span>

								<!-- Focus Dot -->
								<span class="h-2 w-2 rounded-full group-hover:bg-yellow-500
									transition-all duration-150 delay-100"></span>
							</span>
						</a>
					</div>

					<!-- Item #2 -->
					<div class="flex group">
						<a href="#" class="p-3 text-gray-400 hover:text-yellow-500">
							<span class="flex flex-col items-center">
								<!-- Icon -->
								<i class="mdi mdi-compass-outline mdi-24px mx-1 text-gray-500 group-hover:text-gray-700
									transition-color duration-200"></i>

								<!-- Text -->
								<span class="text-xs mb-2 transition-all duration-200">
									Explore
								</span>

								<!-- Focus Dot -->
								<span class="h-2 w-2 rounded-full group-hover:bg-yellow-500
									transition-all duration-150 delay-100"></span>
							</span>
						</a>
					</div>

					<!-- Item #3 Active -->
					<div class="flex group">
						<a href="#" class="p-3 text-yellow-500 hover:text-yellow-500">
							<span class="flex flex-col items-center">
								<!-- Icon -->
								<i class="mdi mdi-layers-outline mdi-24px mx-1 text-gray-700 group-hover:text-gray-700
									transition-color duration-200"></i>

								<!-- Text -->
								<span class="text-xs mb-2 transition-all duration-200">
									Feeds
								</span>

								<!-- Focus Dot -->
								<span class="h-1 w-5 rounded-full bg-yellow-500 group-hover:bg-yellow-500
									hover:h-3 hover:w-3 transition-all duration-150 delay-100"></span>
							</span>
						</a>
					</div>

					<!-- Item #4 -->
					<div class="flex group">
						<a href="#" class="p-3 text-gray-400 hover:text-yellow-500">
							<span class="flex flex-col items-center">
								<!-- Icon -->
								<i class="mdi mdi-basket-plus-outline mdi-24px mx-1 text-gray-500 group-hover:text-gray-700
									transition-color duration-200"></i>

								<!-- Text -->
								<span class="text-xs mb-2 transition-all duration-200">
									Cart
								</span>

								<!-- Focus Dot -->
								<span class="h-2 w-2 rounded-full group-hover:bg-yellow-500
									transition-all duration-150 delay-100"></span>
							</span>
						</a>
					</div>

					<!-- Item #5 -->
					<div class="flex group">
						<a href="#" class="p-3 text-gray-400 hover:text-yellow-500">
							<span class="flex flex-col items-center">
								<!-- Icon -->
								<i class="mdi mdi-account-circle-outline mdi-24px mx-1 text-gray-500 group-hover:text-gray-700
									transition-color duration-200"></i>

								<!-- Text -->
								<span class="text-xs mb-2 transition-all duration-200">
									Account
								</span>

								<!-- Focus Dot -->
								<span class="h-2 w-2 rounded-full group-hover:bg-yellow-500
									transition-all duration-150 delay-100"></span>
							</span>
						</a>
					</div>
				</div>
	</div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    name: "avocatProfile"
}
</script>
<style lang="">
    
</style>