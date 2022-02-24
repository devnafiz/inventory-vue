<template>
	<div>
		<div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12">
			<router-link class="btn btn-primary" to="/expense">All Expense</router-link>
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
                    <h1 class="h4 text-gray-900 mb-4">Add Expense</h1>
                  </div>
                  <form class="user" @submit.prevent="expenseInsert" >
                    <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-12 col-md-12">
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Amount" v-model="form.amount">
                            <small class="text-danger" v-if="errors.amount">{{errors.amount[0]}}</small>
                    		</div>
                    		
                    		
                    	</div>
                     
                     
                    </div>

                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-lg-12 col-md-12">
                          <textarea type="text" class="form-control" id="exampleInputFirstName" placeholder="Expense Details" v-model="form.details" rows="3"></textarea>
                            <small class="text-danger" v-if="errors.details">{{errors.details[0]}}</small>
                        </div>
                        
                        
                      </div>
                     
                     
                    </div>

                  
                   
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
				form:{
					amount:null,
				   details:null,
          },
         errors:{}
			}
     
		},

    methods:{

         

     expenseInsert(){
       axios.post('/api/expense',this.form)
       .then(()=> {
        this.$router.push({name :'expense'})
        Notification.success()
       })
       .catch(error => this.errors = error.response.data.errors)

     },
     

    }
		
	}
</script>