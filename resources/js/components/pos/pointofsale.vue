<template>
	<div>

       <div class="container-fluid" id="container-wrapper">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">POS Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">POS</li>
            </ol>
          </div>
		
		
              

                     
                    <div class="row">

                      <div class="col-lg-5">
                        <div class="card">
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                               <h6 class="m-0 font-weight-bold text-primary">Expense Insert</h6>
                               <a class="btn btn-sm btn-info pull-right"><font color="#ffffff">Add Customer</font></a> 
                              </div>  
                                
                            <div class="table-responsive" style="font-size: 12px;">
                                <table class="table align-items-center table-flush">
                                  <thead class="thead-light">
                                    <tr>
                                      <th>Name</th>
                                      <th>Qty</th>
                                      <th>Unit</th>
                                      <th>Total</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                          <tr v-for="cart in carts" :key="cart.id">
                                            <td>{{ cart.pro_name }}</td>
                                            <td><input type="text" readonly="" style="width: 15px;" :value="cart.pro_quantity">
                                       <button @click.prevent="increment(cart.id)" class="btn btn-sm btn-success">+</button>
                                   <button  @click.prevent="decrement(cart.id)"  class="btn btn-sm btn-danger" v-if="cart.pro_quantity>=2" >-</button>
                                   <button class="btn btn-sm btn-danger"  disabled="" v-else="">-</button>

                                            </td>
                                            <td>{{ cart.product_price  }}</td>
                                            <td>{{ cart.sub_total }}</td>
                                   <td><a  class="btn btn-sm btn-primary" @click="removeItem(cart.id)"><font color="#ffffff">X</font></a></td>
                                          </tr>
                                    
                                     
                                  </tbody>
                                </table>
                              </div>

                              <div class="card-footer">
                                 <ul class="list-group">
                                     <li class="list-group-item  d-flex justify-content-between align-items-center">
                                       Total quantity :
                                       <strong>{{qty}}</strong>
                                     </li>
                                     <li class="list-group-item  d-flex justify-content-between align-items-center">
                                       Sub Total :
                                       <strong>{{subtotal}}</strong>
                                     </li>
                                     <li class="list-group-item  d-flex justify-content-between align-items-center">
                                       Vat:
                                       <strong>{{vats.vat}}%</strong>
                                     </li>
                                      <li class="list-group-item  d-flex justify-content-between align-items-center">
                                       Total:
                                       <strong>{{subtotal*vats.vat/100 + subtotal}}</strong>
                                     </li>
                                   
                                 </ul>
                                 <form @submit.prevent="orderdone">
                                   <label>Customer Name</label>
                                   <select class="form-control" v-model="customer_id">
                                    <option v-for="customer in customers" :value="customer.id">{{customer.name}}</option>
                                     
                                   </select>
                                   <label>Pay</label>
                                   <input type="text"  class="form-control" required v-model="pay">

                                   <label>Due</label>
                                   <input type="text"  class="form-control" required v-model="due">

                                   <label>Pay By</label>
                                   <select class="form-control"  v-model="payby">
                                    <option value="Handcash">Hand cash</option>
                                    <option value="Gittcard">gift card</option>
                                    <option value="cheaque">cheaque</option>
                                     
                                   </select>
                                   <br>
                                   <button type="submit" class="btn btn-primary">submit</button>
                                 </form>
                                
                              </div>
                        </div>
                       
                        
                      </div>
                      <div class="col-lg-7 mb-4">
                        <!-- Simple Tables -->
                        <div class="card">
                          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                          </div>


                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">All Product</button>
                            </li>
                            <li class="nav-item" role="presentation" v-for="category in categories" :key="category.id">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" @click="subProduct(category.id)">{{category.category_name}}</button>
                            </li>
                            
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="card-body">
                                     <input type="text" v-model="searchTerm" class="form-control" style="width: 360px;" placeholder="Search Product">
                                   <div class="row">
                                    <div class="col-md-3 col-lg-3 col-sm-6" v-for="product in filtersearch" :key="product.id" style="margin:7px;">
                                    <button @click.prevent="AddToCart(product.id)" class="btn btn-sm">
                                        <div class="card" style="width: 8.5rem; margin-bottom: 5px;">
                                          <img :src="product.image" id="em_photo" class="card-img-top">
                                          <div class="card-body">
                                            <h5 class="card-title">{{product.product_name}}</h5>
                                           
                                               <span class="badge badge-success" v-if="product.product_quantity  >= 1 ">Available {{ product.product_quantity }}  </span> 
                                               <span class="badge badge-danger" v-else=" ">Stock Out </span> 
                                            
                                          </div>
                                          
                                        </div>
                                        </button>
                                      
                                    </div>
                                  </div>
                                      
                                    </div>


                            </div><!-- end tab home-->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <!-- category block-->
                                <input type="text" v-model="getSearchTerm" class="form-control" style="width: 360px;" placeholder="Search Product">
                                   <div class="row">
                                    <div class="col-md-3 col-lg-3 col-sm-6" v-for="getproduct in getfiltersearch" :key="getproduct.id" style="margin:7px;">
                                       <button @click.prevent="AddToCart(getproduct.id)" class="btn btn-sm">
                                        <div class="card" style="width: 8.5rem; margin-bottom: 5px;">
                                          <img :src="getproduct.image" id="em_photo" class="card-img-top">
                                          <div class="card-body">
                                            <h5 class="card-title">{{getproduct.product_name}}</h5>
                                           
                                               <span class="badge badge-success" v-if="getproduct.product_quantity  >= 1 ">Available {{ getproduct.product_quantity }}  </span> 
                                               <span class="badge badge-danger" v-else=" ">Stock Out </span> 
                                            
                                          </div>
                                          
                                        </div></button>
                                      
                                    </div>
                                  </div>
                                      
                                    </div>
                                    <!--end category block-->

                            </div>
                           
                          </div>


                         <!--endtab-->

                       
                          <div class="card-footer"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                </div>
               </div> 


</template>

<style scoped>
	 #em_photo{
    height: 80px;
    width: 130px;
  }
  .card .table td, .card .table th {
    padding-right: 0px;
    padding-left: 1.5rem;
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
     created(){
             this.allProduct();
             this.allCategory();
              this.allCustomer();
              this.cartProduct();
              this.vat();

              Reload.$on('AfterAdd',()=>{
                 this.cartProduct();
              })
        //console.log( )
      },
		data(){
      return{
        customer_id:'',
        pay:'',
        due:'',
        payby:'',
        products:[],
        categories:'',
        getproducts:[],
        searchTerm:'',
        getSearchTerm:'',
        customers:'',
        carts:[],
        vats:''
      }
    },	
    computed:{
       filtersearch(){
        return this.products.filter(product =>{

          return product.product_name.match(this.searchTerm)
        })
       },

       getfiltersearch(){
        return this.getproducts.filter(getproduct =>{

          return getproduct.product_name.match(this.getSearchTerm)
        })
       },

       qty(){
           let sum = 0;
            for(let i = 0; i < this.carts.length; i++){
               sum +=(parseFloat(this.carts[i].pro_quantity));
            }

           return sum; 
       },

       subtotal(){
          let sum = 0;
            for(let i = 0; i < this.carts.length; i++){
               sum +=(parseFloat(this.carts[i].pro_quantity)*parseFloat(this.carts[i].product_price));
            }
            return sum;
       },
    },

    methods:{

      AddToCart(id){
          axios.get('/api/addTocart/'+id)
        .then(() =>{
            Reload.$emit('AfterAdd');
            Notification.cart_success();

        })
        .catch(error => this.errors = error.response.data.errors)
      },
      //end cart method

      cartProduct(){
           axios.get('/api/cart/product')
        .then(({data}) => (this.carts = data))
        .catch(error => this.errors = error.response.data.errors)
      },
      allProduct(){
        axios.get('/api/product/')
        .then(({data}) => (this.products = data))
        .catch(error => this.errors = error.response.data.errors)
      },

      allCategory(){
        axios.get('/api/category')
        .then(({data}) =>(this.categories = data))
        .catch(error => this.errors = error.response.data.errors)
      },
       allCustomer(){
        axios.get('/api/customer')
        .then(({data}) =>(this.customers = data))
        .catch(error => this.errors = error.response.data.errors)
      },


       subProduct(id){
        axios.get('/api/getting/product/'+id)
        .then(({data}) =>(this.getproducts = data))
        .catch(error => this.errors = error.response.data.errors)
      },
      //remove item
      removeItem(id){
           axios.get('/api/remove/cart/'+id)
        .then(() =>{
            Reload.$emit('AfterAdd');
            Notification.cart_delete();

        })
        .catch(error => this.errors = error.response.data.errors)
      },
      increment(id){

          axios.get('/api/increment/'+id)
        .then(() =>{
            Reload.$emit('AfterAdd');
            Notification.success();

        })
        .catch(error => this.errors = error.response.data.errors)
      },
       //decrement item
      decrement(id){

             axios.get('/api/decrement/'+id)
        .then(() =>{
            Reload.$emit('AfterAdd');
            Notification.success();

        })
        .catch(error => this.errors = error.response.data.errors)

      },

      vat(){

        axios.get('/api/vats/')
        .then(({data}) =>(this.vats = data))
        .catch(error => this.errors = error.response.data.errors)
      },

      orderdone(){
        let total = this.subtotal*this.vats.vat/100 + this.subtotal;
        var data = { qty:this.qty , subtotal:this.subtotal, customer_id :this.customer_id, payby:this.payby, pay:this.pay, due:this.due, vat:this.vats.vat, total:total }


          axios.post('/api/orderdone',data)
          .then(()=> {
         
          Notification.success()
          this.$router.push({name :'home'})

         })
       
      }



      
      
    }
   
		
	}
</script>