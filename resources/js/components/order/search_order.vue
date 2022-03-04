<template>
	<div>
		<div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12">
			<router-link class="btn btn-primary" to="/order">Today Order</router-link>
    </div>
			
		</div>
		<div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Search Order</h1>
                  </div>
                  <form class="user" @submit.prevent="searchDate" >
                    <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-12 col-md-12">
                          <label>Search by date</label>
                    			<input type="date" class="form-control" id="exampleInputFirstName"  v-model="date" required>
                            
                    		</div>
                    		
                    		
                    	</div>
                     
                     
                    </div>

                  
                   
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </div>
                    <hr>
                   <!--  <a href="index.html" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                  
                  </div>
                  <div class="text-center">
                  	
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>


</template>

<style>
	
</style>

<script>
	export default{
    created(){

      if(!User.loggedIn()){
        //this.$router.push({name:'home'})
        this.$router.push({name:'/'})
      }
    },
			data(){
			return{
				
        date:'',
        orders:{},
        errors:{}
			}
     
		},

    methods:{

         

     searchDate(){
      var data = {date:this.date}
       axios.post('/api/search/order/',data)
       .then(({data})=> (this.orders = data))
       
       .catch(error => this.errors = error.response.data.errors)

     },
     

    }
		
	}
</script>