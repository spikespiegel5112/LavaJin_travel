<template>
<div class='main_container'>
    <div class='index_carousel_wrapper swiper-container'>
        <ul class='swiper-wrapper'>
            <li class='swiper-slide'>
                <a href='javascript:;'>
                    <img src='../images/banner_articlelist_announcement_00000.jpg' />
                </a>
            </li>
            <li class='swiper-slide'>
                <a href='javascript:;'>
                    <img src='../images/banner_articlelist_news_00000.jpg' />
                </a>
            </li>
        </ul>
        <div class='swiper-pagination'></div>
    </div>
    <div class='index_productlist_wrapper'>
        <ul>
            <li>
                <a href="javascript:;">
                    <img />
                </a>
            </li>
        </ul>
    </div>
</div>
</template>
<script>
import swiper from 'swiper'
export default {
    mounted() {
        swiper('.index_carousel_wrapper', {
            loop: true,
            pagination: '.swiper-pagination'
        })
    }
}
</script>
