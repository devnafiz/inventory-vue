<template>
	<div>
		<div class="row">
			<router-link class="btn btn-primary" to="/salary">Go back</router-link>
			
		</div>
		<div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Update Salary</h1>
                  </div>
                  <form class="user" @submit.prevent="SalaryUpdate" >
                    <input type="hidden" v-model="form.employee_id">
                    <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-6 col-md-6">
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Full Name" v-model="form.name">
                            <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			<input type="email" class="form-control" id="exampleInputFirstName" placeholder="Enter your email" v-model="form.email">
                            <small class="text-danger" v-if="errors.name">{{errors.email[0]}}</small>
                    		</div>
                    		
                    	</div>
                     
                     
                    </div>

                     <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-6 col-md-6">
                    			
                          <select class="form-control" id="exampleFormControlSelect1" v-model="form.salary_month">
                              <option value="January">January</option>
                              <option value="February">February</option>
                              <option value="March">March</option>
                              <option value="April">April</option>
                              <option value="May">May</option>
                              <option value="jun">jun</option>
                              <option value="july">july</option>
                              <option value="august">august</option>
                              <option value="september">september</option>
                              <option value="october">october</option>
                              <option value="Nevember">Nevember</option>
                              <option value="December">December</option>

                           
                           
                          </select>
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter  your salary" v-model="form.amount">
                           <small class="text-danger" v-if="errors.amount">{{errors.amount[0]}}</small>
                    		</div>
                    		
                    	</div>
                     
                     
                    </div>

                    

                     
                    
                   
                   
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Update</button>
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
					name:'',
					email:'',
          salary_month:'',
          amount:'',
          employee_id:''
         
					},
         errors:{}
			}
     
		},
    created(){
     let id = this.$route.params.id
          axios.get('/api/edit/salary/'+id)
          .then(({data}) =>(this.form = data))
          .catch(error => this.errors = error.response.data.errors)
    },

    methods:{

         

     SalaryUpdate(){
       let id = this.$route.params.id
       axios.post('/api/salary/update/'+id,this.form)
       .then(()=> {
        this.$router.push({name :'salary'})
        Notification.success()
       })
       .catch(error => this.errors = error.response.data.errors)

     },
     

    }
		
	}
</script>