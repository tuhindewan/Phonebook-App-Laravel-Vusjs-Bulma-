<template>
	<div class="modal" :class="openModal">
	  <div class="modal-background"></div>
	  <div class="modal-card">
	    <header class="modal-card-head">
	      <p class="modal-card-title">{{ item.name }}'s Details</p>
	      <button class="delete" aria-label="close" @click="close"></button>
	    </header>
	    <section class="modal-card-body">
	    	<div class="field">
	    	  <label class="label">Name</label>
	    	  <div class="control">
	    	    {{ item.name }}
	    	  </div>
	    	</div>
	    	<div class="field">
	    	  <label class="label">Phone</label>
	    	  <div class="control">
	    	    {{ item.phone }}
	    	  </div>
	    	</div>
	    	<div class="field">
	    	  <label class="label">Email</label>
	    	  <div class="control">
	    	    {{ item.email }}
	    	  </div>
	    	</div>
	      

	    </section>
	    <footer class="modal-card-foot">
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
				item: "",
			}
		},

		methods : {
			close : function(){
				this.$emit('cancelRequest');
			},
		},
	}
</script>