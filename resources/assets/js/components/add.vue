<template>
	<div class="modal" :class="openModal">
	  <div class="modal-background"></div>
	  <div class="modal-card">
	    <header class="modal-card-head">
	      <p class="modal-card-title">Add New Entry</p>
	      <button class="delete" aria-label="close" @click="close"></button>
	    </header>
	    <section class="modal-card-body">

	      <div class="field">
	        <label class="label">Name</label>
	        <div class="control">
	          <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Name" v-model="item.name">
	        </div>
	        <small v-if="errors.name" class="has-text-danger">{{ errors.name[0] }}</small>
	      </div>

	      <div class="field">
	        <label class="label">Phone</label>
	        <div class="control">
	          <input class="input" :class="{'is-danger':errors.phone}" type="text" placeholder="Phone" v-model="item.phone">
	        </div>
	        <small v-if="errors.phone" class="has-text-danger">{{ errors.phone[0] }}</small>
	      </div>

	      <div class="field">
	        <label class="label">Email</label>
	        <div class="control">
	          <input class="input" :class="{'is-danger':errors.email}" type="text" placeholder="Email" v-model="item.email">
	        </div>
	        <small v-if="errors.email" class="has-text-danger">{{ errors.email[0] }}</small>
	      </div>

	    </section>
	    <footer class="modal-card-foot">
	      <button class="button is-success" @click="save">Save</button>
	      <button class="button" @click="close">Cancel</button>
	    </footer>
	  </div>
	</div>
</template>

<script>
	export default{
		props : ['openModal'],
		data(){
			return{
					item:{
						name:'',
						phone:'',
						email:''
					},
					errors :{},
				}
		},
		methods : {
			close : function(){
				this.$emit('cancelRequest');
			},

			save : function(){
				axios.post('/phonebook',this.$data.item)
				.then((response)=>{ 
								this.close() 
								this.$parent.items.push(this.$data.item)
									})
				  .catch((error)=>this.errors = error.response.data);
			}
		},
	}
</script>