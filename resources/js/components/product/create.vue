<template>
	<div>
		<div class="row">
			<router-link class="btn btn-primary" to="/product">All Product</router-link>
			
		</div>
		<div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                  </div>
                  <form class="user" @submit.prevent="productInsert" enctype="multipart/form-data">
                    <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-6 col-md-6">
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Product Name" v-model="form.product_name">
                            <small class="text-danger" v-if="errors.product_name">{{errors.name[0]}}</small>
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Product code" v-model="form.product_code">
                            <small class="text-danger" v-if="errors.product_code">{{errors.product_code[0]}}</small>
                    		</div>
                    		
                    	</div>
                     
                     
                    </div>

                     <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-6 col-md-6">
                    		
                         
                          <select class="form-control" id="exampleFormControlSelect1" v-model="form.category_id">
                             <option value="">Select Category</option>
                            <option :value="category.id" v-for="category in categories">{{category.category_name}}</option>
                           
                          </select>
                  
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			<select class="form-control" id="exampleFormControlSelect1" v-model="form.supplier_id">
                            <option :value="supplier.id" v-for="supplier in suppliers">{{supplier.name}}</option>
                           
                            
                          </select>
                    		</div>
                    		
                    	</div>
                     
                     
                    </div>

                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-lg-4 col-md-4">
                          <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Product root " v-model="form.root ">
                            <small class="text-danger" v-if="errors.root ">{{errors.root [0]}}</small>
                        </div>
                        <div class="col-lg-4 col-md-4">
                          <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Product buying price " v-model="form.buying_price ">
                            <small class="text-danger" v-if="errors.buying_price ">{{errors.buying_price[0]}}</small>
                        </div>
                          <div class="col-lg-4 col-md-4">
                          <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Product selling price " v-model="form.selling_price ">
                            <small class="text-danger" v-if="errors.selling_price ">{{errors.selling_price [0]}}</small>
                        </div>
                        
                      </div>
                     
                     
                    </div>

                    <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-6 col-md-6">
                    			<input type="date" class="form-control" id="exampleInputFirstName" placeholder="Enter  Buying date" v-model="form.buying_date ">
                             <small class="text-danger" v-if="errors.buying_date ">{{errors.buying_date[0]}}</small>
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter  your quantity" v-model="form.product_quantity">
                             <small class="text-danger" v-if="errors.product_quantity ">{{errors.product_quantity[0]}}</small>
                    		</div>
                    		
                    	</div>
                     
                     
                    </div>
                    <!-- <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-6 col-md-6">
                    			<input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your phone Number" v-model="form.phone">
                            <small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small> 
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			
                    		</div>
                    		
                    	</div>
                     
                     
                    </div> -->

                     <div class="form-group">
                    	<div class="form-row">
                    		<div class="col-lg-6 col-md-6">

                    			
			                        <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">
                              <small class="text-danger" v-if="errors.image">{{errors.image[0]}}</small> 
			                        <label class="custom-file-label" for="customFile">Choose file</label>
			                      
                    			
                           
                    		</div>
                    		<div class="col-lg-6 col-md-6">
                    			<img :src="form.image" style="width:40px; height: 40px;">
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
					product_name:null,
					product_code:null,
          category_id:null,
          root:null,
          buying_price:null,
          selling_price:null,
          image:null,
          supplier_id:null,
					buying_date:null,
          product_quantity:null,
					},
         errors:{},
         categories:{},
         suppliers:{},
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

                this.form.image = event.target.result
                console.log(event.target.result);
              };
              reader.readAsDataURL(file);
           }
     },

     productInsert(){
       axios.post('/api/product',this.form)
       .then(()=> {
        this.$router.push({name :'product'})
        Notification.success()
       })
       .catch(error => this.errors = error.response.data.errors)

     },
     

    },

    created(){

      axios.get('/api/category')
     .then(({data}) => (this.categories = data))
    
       axios.get('/api/supplier')
     .then(({data}) => (this.suppliers = data))
    }
		
	}
</script>