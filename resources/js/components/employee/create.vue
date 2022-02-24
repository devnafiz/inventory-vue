<template>
	<div>
		<div class="row">
			<router-link class="btn btn-primary" to="/employee">All Employee</router-link>
			
		</div>
		<div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Employee</h1>
                  </div>
                  <form class="user" @submit.prevent="employeeInsert" enctype="multipart/form-data">
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
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your address" v-model="form.address">
                         <small class="text-danger" v-if="errors.address">{{errors.address[0]}}</small>
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter  your salary" v-model="form.salary">
                           <small class="text-danger" v-if="errors.salary">{{errors.salary[0]}}</small>
                    		</div>
                    		
                    	</div>
                     
                     
                    </div>

                    <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-6 col-md-6">
                    			<input type="date" class="form-control" id="exampleInputFirstName" placeholder="Enter Your joining date" v-model="form.joining_date">
                             <small class="text-danger" v-if="errors.joining_date">{{errors.joining_date[0]}}</small>
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter  your nid" v-model="form.nid">
                             <small class="text-danger" v-if="errors.nid">{{errors.nid[0]}}</small>
                    		</div>
                    		
                    	</div>
                     
                     
                    </div>
                    <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-6 col-md-6">
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your phone Number" v-model="form.phone">
                            <small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small> 
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			
                    		</div>
                    		
                    	</div>
                     
                     
                    </div>

                     <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-6 col-md-6">

                    			
			                        <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">
                              <small class="text-danger" v-if="errors.photo">{{errors.photo[0]}}</small> 
			                        <label class="custom-file-label" for="customFile">Choose file</label>
			                      
                    			
                           
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			<img :src="form.photo" style="width:40px; height: 40px;">
                    		</div>
                    		
                    	</div>
                     
                     
                    </div>
                    
                   
                   
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
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
					name:null,
					email:null,
          phone:null,
          salary:null,
          address:null,
          nid:null,
          photo:null,
          joining_date:null,
					
					},
         errors:{}
			}
     
		},

    methods:{

         onFileSelected(event){
           let file = event.target.files[0];
           if(file.size > 1048770){
              //console.log(file)

            Notification.image_validation()
           }else{
              let reader = new FileReader();
              reader.onload = event =>{

                this.form.photo = event.target.result
                console.log(event.target.result);
              };
              reader.readAsDataURL(file);
           }
     },

     employeeInsert(){
       axios.post('/api/employee',this.form)
       .then(()=> {
        this.$router.push({name :'employee'})
        Notification.success()
       })
       .catch(error => this.errors = error.response.data.errors)

     },
     

    }
		
	}
</script>