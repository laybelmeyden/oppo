<template>
  <div class="container">
    <div class="progress" style="height: 20px;margin-top: 10px;" :val="fileProgress"
                    v-if="fileProgress">
      <div
        class="progress-bar"
        role="progressbar"
        :style="{ width:fileProgress + '%'}"
      >{{ fileCurrent }}%</div>
    </div>
    <input type="file" name="app" class="fileElem"  @change="fileInputChange" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      fileOrder: [],
      filesFinish: [],
      fileProgress: 0,
      fileCurrent: ""
    };
  },
  methods: {
   async fileInputChange(){
       let files = Array.from(event.target.files);
       this.fileOrder = files.slice();

       for ( let item of files){
          await this.uploadFile(item);
       }
    },
    async uploadFile(item){
        let form = new FormData();
        form.append('app', item);


        await axios
        .post('/update_main_form', form, {
            onUploadProgress: (itemUpload) =>{
                this.fileProgress = Math.round( (itemUpload.loaded / itemUpload.total)*100 );
                this.fileCurrent = item.name + ' ' + this.fileProgress;
            }
        })
        .then(response => {
            this.fileProgress = '';
            this.fileCurrent = 100;
            this.filesFinish.push(item);
            this.fileOrder.splice(item, 1);
        })
        .catch(error => {
            alert('Ошибка при загрузке файла, попробуйте еще раз !')
        })
    }
  }
};
</script>
