<template>
	
    

</template>

<style>
	
</style>

<script>
  export default {
      //first claa created method like mounted
      created(){
            localStorage.removeItem('token')
            localStorage.removeItem('user')
             Toast.fire({
                icon: 'success',
                title: 'logout in successfully'
              })

             this.$router.push({name:'/'})
      }

  }
	
</script>