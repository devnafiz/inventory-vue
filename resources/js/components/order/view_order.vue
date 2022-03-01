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
                        <div class="card-header align-items-center justify-content-center">
                          <h6 class="text-center"> Order Details</h6>
                          
                        </div>
                         <div class="table-responsive">
                           <ul class="list-group">
                              <li class="list-group-item"><b>Name:</b>{{orders.name}}</li>
                              <li class="list-group-item"><b>Phone:</b>{{orders.phone}}</li>
                              <li class="list-group-item"><b>Address:</b>{{orders.address}}</li>
                              <li class="list-group-item"><b>Date:</b>{{orders.order_date}}</li>
                              <li class="list-group-item"><b>Pay Through:</b>{{orders.payby}}</li>
                             
                           </ul>
                           
                         </div>
                         
                       </div>
                      
                    </div>


                      <div class="col-lg-6">
                       <div class="card">
                        <div class="card-header align-items-center justify-content-center">
                          <h6 class="text-center"> Order Details</h6>
                          
                        </div>
                         <div class="table-responsive">
                            <ul class="list-group">
                              <li class="list-group-item"><b>Sub Total:</b> {{orders.sub_total}} $</li>
                              <li class="list-group-item"><b>Vat:</b> {{orders.vat}} $</li>
                              <li class="list-group-item"><b>Total amount:</b> {{orders.total}} $</li>
                              <li class="list-group-item"><b>Pay Amount:</b> {{orders.pay}} $</li>
                              <li class="list-group-item"><b>Due amount:</b> {{orders.due}} $</li>
                             
                           </ul>
                           
                         </div>
                         
                       </div>
                      
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-header align-items-center justify-content-center">
                          <h6 class="text-center"> Order deatils</h6>
                          
                        </div>
                        <div class="table-responsive">
                             <table class=" table ">
                                <thead>
                                  <tr>
                                    <th>Product name</th>
                                     <th>Product Code</th>
                                     <th>Image</th>
                                     <th>Quantity</th>
                                     <th>unit Price</th>
                                      <th>Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr v-for="item in details">
                                    <td>{{item.product_name}}</td>
                                    <td>{{item.product_code}}</td>
                                    <td><img :src="'/'+item.image" id="em_photo"></td>
                                    <td>{{item.pro_quantity}}</td>
                                    <td>{{item.product_price}}</td>
                                    <td>{{item.sub_total}}</td>
                                  </tr>
                                </tbody>
                               
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

<style scoped>
	#em_photo{
    width: 40px;
    height: 40px;
  }
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