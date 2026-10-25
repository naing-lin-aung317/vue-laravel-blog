<template>
    <h1  :key="blog.id"> {{ blog.title }}</h1>
    <p  :key="blog.id"> {{ blog.description }}</p>
    <Link :href="`/blogs/${blog.id}/edit`">Edit</Link>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default{
    components: { Link },
    props:{
        blog:{
            type: Object,
        
        }
    }
}

</script>