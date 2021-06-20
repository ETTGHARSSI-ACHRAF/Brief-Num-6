<template>
    <div id="nav" class="nav">
        <router-link class="link" to="/inscription">Novau utilisateure</router-link> <br>
        <router-link class="link" to="/login">rendez-vous</router-link>
    </div>
</template>

<script>
export default {
    name:'nave',
}
</script>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins', sans-serif
}

body {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    /* background: rgb(114, 14, 14); */
}

.link {
    text-decoration: none;
    display: inline-block;
    position: relative;
    padding: 20px 40px;
    text-transform: uppercase;
    
    font-size: 16px;
    margin: 20px;
    letter-spacing: 0.7em;
    border-radius: 5px;
    background:none;
    border: 1px solid rgb(59, 59, 236);
    color: rgb(59, 59, 236);
    transition: 0.5s;
}



.link:hover {
    
    color: #ddd;
    background: rgb(59, 59, 236);
}
</style>