<script>
export default {
    data() {
        return {
            overlayVisibility: false,
            loggedIn: false
        };
    },
    methods: {
        ShowOverlay() {
            this.overlayVisibility = true;
        },
        hideOverlay() {
            this.overlayVisibility = false;
        },
        updateSidebar() {
            this.loggedIn = !this.loggedIn;
        },
    },
    mounted() {
        if(localStorage.getItem('authenticated')) {
            this.loggedIn = true;
        } else {
            this.loggedIn = false;
        }
    }
}
</script>

<template>
    <div id="wrapper">
        <!-- sidebar -->
        <div class="sidebar">
            <span class="closeButton">&times;</span>
            <p class="brand-title"><a href="">Abdo Blog</a></p>

            <div class="side-links">
                <ul>
                    <li><router-link @click="hideOverlay" :to="{ name: 'Home' }">Home</router-link></li>
                    <li><router-link @click="hideOverlay" :to="{ name: 'Blog' }">Blog</router-link></li>
                    <li><router-link @click="hideOverlay" :to="{ name: 'About' }">About</router-link></li>
                    <li><router-link @click="hideOverlay" :to="{ name: 'Contact' }">Contact</router-link></li>
                    <li v-if="!loggedIn"><router-link @click="hideOverlay" :to="{ name: 'Register' }">Register</router-link></li>
                    <li v-if="!loggedIn"><router-link @click="hideOverlay" :to="{ name: 'Login' }">Login</router-link></li>
                    <li v-if="loggedIn"><router-link @click="hideOverlay" :to="{ name: 'Dashboard' }">Dashboard</router-link></li>
                </ul>
            </div>

            <!-- sidebar footer -->
            <footer class="sidebar-footer">
                <div>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                </div>

                <small>&copy 2021 Alphayo Blog</small>
            </footer>
        </div>
        <!-- Menu Button -->
        <div class="menuButton">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <!-- main -->
        <main class="container">
            <!-- Render Components Depending on the page visited -->
            <router-view @update-sidebar="updateSidebar" :key="$route.path"></router-view>
        </main>

        <!-- Main footer -->
        <footer class="main-footer">
            <div>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
            <small>&copy 2021 Alphayo Blog</small>
        </footer>
    </div>
</template>

<style lang="scss" scoped></style>