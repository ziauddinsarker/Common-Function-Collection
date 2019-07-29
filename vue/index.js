var app = new Vue({ 
    el: '#app',
    data: {
        message: 'Hello zia!'
    }
});

var app2 = new Vue({
	el: '#app-2',
	data:{
		message2:'You loaded this page on'+ new Date().toLocaleString()
	}
});


var app3 = new Vue({
	el: '#app-3',
	data:{
		seen:true
	}
});


var app4 = new Vue({
	el: '#app-4',
	data:{
		todos:[
		{text:'Learn Javascript'},
		{text:'Learn Vue'},
		{text:'Build something Awesome'}
		
		]
	}
});

var app5 = new Vue({ 
    el: '#app-5',
    data: {
        message: 'Hello Vue.js'
    },
    methods:{
    	reverseMessage: function(){
    		this.message = this.message.split('').reverse().join('')
    	}
    }});

var app6 = new Vue({ 
    el: '#app-6',
    data: {
        message: 'Hello Vue'
    }
});

	//Composing with componants 
    Vue.component('todo-item',{
    	props: ['todo'],
    	template: '<li>{{todo.text}}</li>'
    })

    var app7 = new Vue({
    	el: '#app-7',
    	data:{
    		groceryList:[
			{id:0, text: 'Vegetable'},
			{id:1, text: 'Cheese'},
			{id:2, text: 'Whatever else human are supposed to eat'}

    		]
    	}
    });
    
