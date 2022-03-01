<template>
	<div>
		<div class="row">
			<router-link class="btn btn-primary" to="/order">all Order</router-link>
			
		</div>
		<div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Order Details</h1>
                  </div>

                  <div  class="row">
                    <div class="col-lg-6">
                       <div class="card">
                         <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              
                            </table>
                           
                         </div>
                         
                       </div>
                      
                    </div>


                      <div class="col-lg-6">
                       <div class="card">
                         <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              
                            </table>
                           
                         </div>
                         
                       </div>
                      
                    </div>
                    
                  </div>
                  
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
				
         errors:{},
         orders:{},
         details:{},
			}
     
		},
    created(){
     let id = this.$route.params.id
          axios.get('/api/order/details/'+id)
          .then(({data}) =>(this.orders = data))
          .catch(error => this.errors = error.response.data.errors)

              axios.get('/api/order/orderdetails/'+id)
          .then(({data}) =>(this.details = data))
          .catch(error => this.errors = error.response.data.errors)

       
    },

    methods:{

        

   
     

    }
    
		
	}
</script>