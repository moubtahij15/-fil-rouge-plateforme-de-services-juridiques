<template lang="">
    <section class=" bg-white overflow-hidden">


            <Search/>

            <div class="   bg-white  z-30 flex flex-col px-10  mx-auto md:flex-row  max-w-7xl">

                <div class=" flex flex-col   border-solid-primary border- w-full space-y-8 md:w-1/2 sm:pr-8">
                   

                    <!-- serach result -->
		
			     <div class=" mt-20 hover:bg-white1 rounded-3xl p-4    shadow-md  hover:shadow-2xl  flex-none sm:flex">
					<div class=" relative h-32 w-32   sm:mb-0 mb-3">
						<img src="../../assets/search.svg" alt="aji" class=" w-32 h-32 object-cover rounded-2xl">
						
					    </div>
					    <div class="flex-auto sm:ml-5 justify-between">
						<div class="flex items-center justify-between sm:mt-2">
							<div class="flex items-center">
								<div class="flex flex-col">
									<div class="w-full flex-none text-lg text-primary font-bold leading-none">nom prenom</div>
									<div class="flex-auto text-gray-500 my-1">
										<span class="mr-3 ">adresse</span><span class="mr-3 border-r border-gray-200  max-h-0"></span><span>ville</span>
									</div>
								</div>
							</div>
						</div>
						<div class="flex flex-row items-center">
							<div class="flex">
                                categorie
							</div>
							<div class="flex-1 inline-flex  hidden items-center">
								<img class="w-5 h-5" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDY0IDY0IiBoZWlnaHQ9IjY0cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA2NCA2NCIgd2lkdGg9IjY0cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0zMiw3LjE3NEMxOC4zMTEsNy4xNzQsNy4xNzQsMTguMzExLDcuMTc0LDMyYzAsMTMuNjg5LDExLjEzNywyNC44MjYsMjQuODI2LDI0LjgyNmMxMy42ODksMCwyNC44MjYtMTEuMTM3LDI0LjgyNi0yNC44MjYgIEM1Ni44MjYsMTguMzExLDQ1LjY4OSw3LjE3NCwzMiw3LjE3NHogTTM4LjE3NCwzMi44NzRoLTQuMDM5YzAsNi40NTMsMCwxNC4zOTgsMCwxNC4zOThoLTUuOTg1YzAsMCwwLTcuODY4LDAtMTQuMzk4aC0yLjg0NXYtNS4wODggIGgyLjg0NXYtMy4yOTFjMC0yLjM1NywxLjEyLTYuMDQsNi4wNC02LjA0bDQuNDMzLDAuMDE3djQuOTM5YzAsMC0yLjY5NSwwLTMuMjE5LDBjLTAuNTI0LDAtMS4yNjgsMC4yNjItMS4yNjgsMS4zODZ2Mi45OWg0LjU2ICBMMzguMTc0LDMyLjg3NHoiLz48L3N2Zz4=">
								<img class="w-5 h-5" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDU2LjY5MyA1Ni42OTMiIGhlaWdodD0iNTYuNjkzcHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1Ni42OTMgNTYuNjkzIiB3aWR0aD0iNTYuNjkzcHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0yOC4zNDgsNS4xNTdjLTEzLjYsMC0yNC42MjUsMTEuMDI3LTI0LjYyNSwyNC42MjVjMCwxMy42LDExLjAyNSwyNC42MjMsMjQuNjI1LDI0LjYyM2MxMy42LDAsMjQuNjIzLTExLjAyMywyNC42MjMtMjQuNjIzICBDNTIuOTcxLDE2LjE4NCw0MS45NDcsNS4xNTcsMjguMzQ4LDUuMTU3eiBNNDAuNzUyLDI0LjgxN2MwLjAxMywwLjI2NiwwLjAxOCwwLjUzMywwLjAxOCwwLjgwM2MwLDguMjAxLTYuMjQyLDE3LjY1Ni0xNy42NTYsMTcuNjU2ICBjLTMuNTA0LDAtNi43NjctMS4wMjctOS41MTMtMi43ODdjMC40ODYsMC4wNTcsMC45NzksMC4wODYsMS40OCwwLjA4NmMyLjkwOCwwLDUuNTg0LTAuOTkyLDcuNzA3LTIuNjU2ICBjLTIuNzE1LTAuMDUxLTUuMDA2LTEuODQ2LTUuNzk2LTQuMzExYzAuMzc4LDAuMDc0LDAuNzY3LDAuMTExLDEuMTY3LDAuMTExYzAuNTY2LDAsMS4xMTQtMC4wNzQsMS42MzUtMC4yMTcgIGMtMi44NC0wLjU3LTQuOTc5LTMuMDgtNC45NzktNi4wODRjMC0wLjAyNywwLTAuMDUzLDAuMDAxLTAuMDhjMC44MzYsMC40NjUsMS43OTMsMC43NDQsMi44MTEsMC43NzcgIGMtMS42NjYtMS4xMTUtMi43NjEtMy4wMTItMi43NjEtNS4xNjZjMC0xLjEzNywwLjMwNi0yLjIwNCwwLjg0LTMuMTJjMy4wNjEsMy43NTQsNy42MzQsNi4yMjUsMTIuNzkyLDYuNDgzICBjLTAuMTA2LTAuNDUzLTAuMTYxLTAuOTI4LTAuMTYxLTEuNDE0YzAtMy40MjYsMi43NzgtNi4yMDUsNi4yMDYtNi4yMDVjMS43ODUsMCwzLjM5NywwLjc1NCw0LjUyOSwxLjk1OSAgYzEuNDE0LTAuMjc3LDIuNzQyLTAuNzk1LDMuOTQxLTEuNTA2Yy0wLjQ2NSwxLjQ1LTEuNDQ4LDIuNjY2LTIuNzMsMy40MzNjMS4yNTctMC4xNSwyLjQ1My0wLjQ4NCwzLjU2NS0wLjk3NyAgQzQzLjAxOCwyMi44NDksNDEuOTY1LDIzLjk0Miw0MC43NTIsMjQuODE3eiIvPjwvc3ZnPg==">
								<img class="w-5 h-5" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGhlaWdodD0iNjdweCIgaWQ9IkxheWVyXzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDY3IDY3OyIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgNjcgNjciIHdpZHRoPSI2N3B4IiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48cGF0aCBkPSJNNTAuODM3LDQ4LjEzN1YzNi40MjVjMC02LjI3NS0zLjM1LTkuMTk1LTcuODE2LTkuMTk1ICBjLTMuNjA0LDAtNS4yMTksMS45ODMtNi4xMTksMy4zNzRWMjcuNzFoLTYuNzljMC4wOSwxLjkxNywwLDIwLjQyNywwLDIwLjQyN2g2Ljc5VjM2LjcyOWMwLTAuNjA5LDAuMDQ0LTEuMjE5LDAuMjI0LTEuNjU1ICBjMC40OS0xLjIyLDEuNjA3LTIuNDgzLDMuNDgyLTIuNDgzYzIuNDU4LDAsMy40NCwxLjg3MywzLjQ0LDQuNjE4djEwLjkyOUg1MC44Mzd6IE0yMi45NTksMjQuOTIyYzIuMzY3LDAsMy44NDItMS41NywzLjg0Mi0zLjUzMSAgYy0wLjA0NC0yLjAwMy0xLjQ3NS0zLjUyOC0zLjc5Ny0zLjUyOHMtMy44NDEsMS41MjQtMy44NDEsMy41MjhjMCwxLjk2MSwxLjQ3NCwzLjUzMSwzLjc1MywzLjUzMUgyMi45NTl6IE0zNCw2NCAgQzE3LjQzMiw2NCw0LDUwLjU2OCw0LDM0QzQsMTcuNDMxLDE3LjQzMiw0LDM0LDRzMzAsMTMuNDMxLDMwLDMwQzY0LDUwLjU2OCw1MC41NjgsNjQsMzQsNjR6IE0yNi4zNTQsNDguMTM3VjI3LjcxaC02Ljc4OXYyMC40MjcgIEgyNi4zNTR6IiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7ZmlsbDojMDEwMTAxOyIvPjwvc3ZnPg==">

                            </div>
							</div>
							<div class="flex pt-2  text-sm text-gray-500">
								<div class="flex-1 inline-flex items-center">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
										fill="currentColor">
										<path
											d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
										</path>
									</svg><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
										fill="currentColor">
										<path
											d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
										</path>
									</svg><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
										fill="currentColor">
										<path
											d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
										</path>
									</svg>
									<p class="">1.2k Followers</p>
								</div>
								<div class="flex-1 inline-flex items-center">
								<button  class="flex-no-shrink bg-green-400 hover:bg-green-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:bg-primary hover:text-white   text-primary rounded-full transition ease-in duration-300">FOLLOW</button>
									
								</div>
							</div>
						</div>
				    	</div> 

                        <!-- 1 -->
                    <div class=" hover:bg-white1 rounded-3xl p-4    shadow-md  hover:shadow-2xl  flex-none sm:flex">
					<div class=" relative h-32 w-32   sm:mb-0 mb-3">
						<img src="../../assets/search.svg" alt="aji" class=" w-32 h-32 object-cover rounded-2xl">
						
					    </div>
					    <div class="flex-auto sm:ml-5 justify-between">
						<div class="flex items-center justify-between sm:mt-2">
							<div class="flex items-center">
								<div class="flex flex-col">
									<div class="w-full flex-none text-lg text-primary font-bold leading-none">nom prenom</div>
									<div class="flex-auto text-gray-500 my-1">
										<span class="mr-3 ">adresse</span><span class="mr-3 border-r border-gray-200  max-h-0"></span><span>ville</span>
									</div>
								</div>
							</div>
						</div>
						<div class="flex flex-row items-center">
							<div class="flex">
                                categorie
							</div>
							<div class="flex-1 inline-flex  hidden items-center">
								<img class="w-5 h-5" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDY0IDY0IiBoZWlnaHQ9IjY0cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA2NCA2NCIgd2lkdGg9IjY0cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0zMiw3LjE3NEMxOC4zMTEsNy4xNzQsNy4xNzQsMTguMzExLDcuMTc0LDMyYzAsMTMuNjg5LDExLjEzNywyNC44MjYsMjQuODI2LDI0LjgyNmMxMy42ODksMCwyNC44MjYtMTEuMTM3LDI0LjgyNi0yNC44MjYgIEM1Ni44MjYsMTguMzExLDQ1LjY4OSw3LjE3NCwzMiw3LjE3NHogTTM4LjE3NCwzMi44NzRoLTQuMDM5YzAsNi40NTMsMCwxNC4zOTgsMCwxNC4zOThoLTUuOTg1YzAsMCwwLTcuODY4LDAtMTQuMzk4aC0yLjg0NXYtNS4wODggIGgyLjg0NXYtMy4yOTFjMC0yLjM1NywxLjEyLTYuMDQsNi4wNC02LjA0bDQuNDMzLDAuMDE3djQuOTM5YzAsMC0yLjY5NSwwLTMuMjE5LDBjLTAuNTI0LDAtMS4yNjgsMC4yNjItMS4yNjgsMS4zODZ2Mi45OWg0LjU2ICBMMzguMTc0LDMyLjg3NHoiLz48L3N2Zz4=">
								<img class="w-5 h-5" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDU2LjY5MyA1Ni42OTMiIGhlaWdodD0iNTYuNjkzcHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1Ni42OTMgNTYuNjkzIiB3aWR0aD0iNTYuNjkzcHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0yOC4zNDgsNS4xNTdjLTEzLjYsMC0yNC42MjUsMTEuMDI3LTI0LjYyNSwyNC42MjVjMCwxMy42LDExLjAyNSwyNC42MjMsMjQuNjI1LDI0LjYyM2MxMy42LDAsMjQuNjIzLTExLjAyMywyNC42MjMtMjQuNjIzICBDNTIuOTcxLDE2LjE4NCw0MS45NDcsNS4xNTcsMjguMzQ4LDUuMTU3eiBNNDAuNzUyLDI0LjgxN2MwLjAxMywwLjI2NiwwLjAxOCwwLjUzMywwLjAxOCwwLjgwM2MwLDguMjAxLTYuMjQyLDE3LjY1Ni0xNy42NTYsMTcuNjU2ICBjLTMuNTA0LDAtNi43NjctMS4wMjctOS41MTMtMi43ODdjMC40ODYsMC4wNTcsMC45NzksMC4wODYsMS40OCwwLjA4NmMyLjkwOCwwLDUuNTg0LTAuOTkyLDcuNzA3LTIuNjU2ICBjLTIuNzE1LTAuMDUxLTUuMDA2LTEuODQ2LTUuNzk2LTQuMzExYzAuMzc4LDAuMDc0LDAuNzY3LDAuMTExLDEuMTY3LDAuMTExYzAuNTY2LDAsMS4xMTQtMC4wNzQsMS42MzUtMC4yMTcgIGMtMi44NC0wLjU3LTQuOTc5LTMuMDgtNC45NzktNi4wODRjMC0wLjAyNywwLTAuMDUzLDAuMDAxLTAuMDhjMC44MzYsMC40NjUsMS43OTMsMC43NDQsMi44MTEsMC43NzcgIGMtMS42NjYtMS4xMTUtMi43NjEtMy4wMTItMi43NjEtNS4xNjZjMC0xLjEzNywwLjMwNi0yLjIwNCwwLjg0LTMuMTJjMy4wNjEsMy43NTQsNy42MzQsNi4yMjUsMTIuNzkyLDYuNDgzICBjLTAuMTA2LTAuNDUzLTAuMTYxLTAuOTI4LTAuMTYxLTEuNDE0YzAtMy40MjYsMi43NzgtNi4yMDUsNi4yMDYtNi4yMDVjMS43ODUsMCwzLjM5NywwLjc1NCw0LjUyOSwxLjk1OSAgYzEuNDE0LTAuMjc3LDIuNzQyLTAuNzk1LDMuOTQxLTEuNTA2Yy0wLjQ2NSwxLjQ1LTEuNDQ4LDIuNjY2LTIuNzMsMy40MzNjMS4yNTctMC4xNSwyLjQ1My0wLjQ4NCwzLjU2NS0wLjk3NyAgQzQzLjAxOCwyMi44NDksNDEuOTY1LDIzLjk0Miw0MC43NTIsMjQuODE3eiIvPjwvc3ZnPg==">
								<img class="w-5 h-5" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGhlaWdodD0iNjdweCIgaWQ9IkxheWVyXzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDY3IDY3OyIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgNjcgNjciIHdpZHRoPSI2N3B4IiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48cGF0aCBkPSJNNTAuODM3LDQ4LjEzN1YzNi40MjVjMC02LjI3NS0zLjM1LTkuMTk1LTcuODE2LTkuMTk1ICBjLTMuNjA0LDAtNS4yMTksMS45ODMtNi4xMTksMy4zNzRWMjcuNzFoLTYuNzljMC4wOSwxLjkxNywwLDIwLjQyNywwLDIwLjQyN2g2Ljc5VjM2LjcyOWMwLTAuNjA5LDAuMDQ0LTEuMjE5LDAuMjI0LTEuNjU1ICBjMC40OS0xLjIyLDEuNjA3LTIuNDgzLDMuNDgyLTIuNDgzYzIuNDU4LDAsMy40NCwxLjg3MywzLjQ0LDQuNjE4djEwLjkyOUg1MC44Mzd6IE0yMi45NTksMjQuOTIyYzIuMzY3LDAsMy44NDItMS41NywzLjg0Mi0zLjUzMSAgYy0wLjA0NC0yLjAwMy0xLjQ3NS0zLjUyOC0zLjc5Ny0zLjUyOHMtMy44NDEsMS41MjQtMy44NDEsMy41MjhjMCwxLjk2MSwxLjQ3NCwzLjUzMSwzLjc1MywzLjUzMUgyMi45NTl6IE0zNCw2NCAgQzE3LjQzMiw2NCw0LDUwLjU2OCw0LDM0QzQsMTcuNDMxLDE3LjQzMiw0LDM0LDRzMzAsMTMuNDMxLDMwLDMwQzY0LDUwLjU2OCw1MC41NjgsNjQsMzQsNjR6IE0yNi4zNTQsNDguMTM3VjI3LjcxaC02Ljc4OXYyMC40MjcgIEgyNi4zNTR6IiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7ZmlsbDojMDEwMTAxOyIvPjwvc3ZnPg==">

                            </div>
							</div>
							<div class="flex pt-2  text-sm text-gray-500">
								<div class="flex-1 inline-flex items-center">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
										fill="currentColor">
										<path
											d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
										</path>
									</svg><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
										fill="currentColor">
										<path
											d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
										</path>
									</svg><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
										fill="currentColor">
										<path
											d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
										</path>
									</svg>
									<p class="">1.2k Followers</p>
								</div>
								<div class="flex-1 inline-flex items-center">
								<button  class="flex-no-shrink bg-green-400 hover:bg-green-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:bg-primary hover:text-white   text-primary rounded-full transition ease-in duration-300">FOLLOW</button>
									
								</div>
							</div>
						</div>
				    	</div> 
			

	                 </div>


                
                    <div class="relative flex-1 w-full  text-black  lg:pl-12 lg:w-6/12 ">
                    <!-- Start of Image -->
                     <img src="../../assets/search.svg" class="w-full">
                    <!-- End of Image -->
                </div>
            </div>  




        </section>

	

</template>
<script>
import { mapActions } from "vuex";
import Search from '@/components/search.vue'
export default {
    name: "avocats",
    components :{
        Search
    }
}
</script>

<style lang="">
    
</style>