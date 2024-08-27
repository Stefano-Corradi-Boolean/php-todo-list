const { createApp } = Vue;

createApp({

  data() {
    return {
      title: 'Todo List',
      apiUrl: 'server.php',
      list: [],
      newTask:{
        title:'',
        description:''
      }
    }
  },

  methods: {
    getApi() {
      axios.get(this.apiUrl)
        .then(res => {
          this.list = res.data;
          console.log(this.list);
        })
    },

    addTask(){
      /*
        1. strutturare i dati da inviare in POST a server.php
        2. invio con axios i dati in POST
        3. aggiorno la lista in base alla risposta del server
        4. resetto i campi
      */

        // const data = {
        //   text: this.newTask.title,
        //   description: this.newTask.description
        // }

        // axios.post(this.apiUrl, data, {
        //   headers:{ 'Content-Type' : 'multipart/form-data' }
        // }).then(res => {
        //   this.list = res.data;
        //   console.log(this.list);
        // })

        // controllo validità dei dati
      if(this.newTask.title.length < 3 || this.newTask.description.length < 3 ){
        alert('Il titolo e la descrizione devo avere almeno 3 caratteri')
      }else{
        // strutturo i dati da inviare già come multiupart-formdata
        const data = new FormData();
        data.append('text',this.newTask.title);
        data.append('description',this.newTask.description);
  
        axios.post(this.apiUrl, data)
          .then(res => {
            this.list = res.data;
            console.log(this.list);
          })
  
        this.newTask.title = '';
        this.newTask.description = '';
      }
    

      
    },

    toggleDone(index){
      const data = new FormData();
      data.append('indexToToggle',index);

      axios.post(this.apiUrl, data)
        .then(res => {
          this.list = res.data;
        })
    },

    deleteTask(index){

      const taskToDelete = this.list[index];

      if(confirm(`Sei sicuro di voler eliminare il task ${taskToDelete.text}?`)){
        const data = new FormData();
        data.append('indextoDelete', index);

        axios.post(this.apiUrl, data)
          .then(res => {
            this.list = res.data;
          })
      }
      
    },

  },

  

  mounted() {
    this.getApi();

  }

}).mount('#app');

