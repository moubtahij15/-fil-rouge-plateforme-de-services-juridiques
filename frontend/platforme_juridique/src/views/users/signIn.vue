<template lang="">
    <section class="  py-0 bg-white text-primary ">

        <div class="flex flex-col items-center justify-between px-10 mx-auto max-w-7xl xl:px-5 lg:flex-row">

            <div class="flex flex-col items-center w-full px-10 pt-5 pb-20 lg:pt-20 lg:flex-row">
                <div class="relative w-full max-w-md bg-cover lg:max-w-2xl lg:w-7/12">
                    <div class="relative flex flex-col items-center justify-center w-full h-full lg:pr-10">
                        <img src="../../assets/Law2.svg">
                    </div>
                </div>
                <signInComponent />

            </div>

        </div>

    </section>
</template>
<script>
import SignInComponent from '@/components/signIn.vue'

export default {
    name: "signIn",
    components: {
        SignInComponent

    }
}
</script>
<style lang="">
    
</style>