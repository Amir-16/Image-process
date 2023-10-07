<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Image-Upload</div>
                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div>
                        <div  v-if="!success" class="alert alert-danger" v-show="show">
                            {{ message }}
                        </div>
                        <form @submit="formSubmit" enctype="multipart/form-data">
                            <input type="file" id="imageFile" required class="form-control" v-on:change="onChange">
                            <br>
                            <button class="btn btn-primary btn-block">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                name: '',
                file: '',
                success: ''
            };
        },
        methods: {
            onChange(e) {
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                data.append('file', this.file);
                axios.post('api/upload', data, config)
                    .then(function (res) {
                        existingObj.success  = res.data.success;
                        document.getElementById('imageFile').value = "";

                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
            }
        }
    }
</script>
