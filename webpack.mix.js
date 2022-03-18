const mix = require('laravel-mix');

const resourcesJs = 'resources/js';
const publicAssets = 'public/assets';

mix.scripts(
  [
    //`${resourcesJs}/statics/jquery.easing.min.js`,
    `${resourcesJs}/statics/jquery.magnific-popup.min.js`,
    `${resourcesJs}/statics/jquery.slicknav.js`,
    `${resourcesJs}/statics/jquery.stellar.min.js`,
    `${resourcesJs}/statics/owl.carousel.js`,
    //`${resourcesJs}/statics/scrolling-nav.js`,
    //`${resourcesJs}/statics/smoothscroll.js`,
    `${resourcesJs}/statics/main.js`
  ],
  `${publicAssets}/js/front-end.js`
);

mix.js(`${resourcesJs}/app.js`, `${publicAssets}/js`);

mix.sass('resources/sass/app.scss', `${publicAssets}/css/app.css`).options({
  processCssUrls: false
});

/**
 * All assets for CMS
 */
mix.js(`${resourcesJs}/cms.js`, `${publicAssets}/js/cms.js`);

mix.disableNotifications();
