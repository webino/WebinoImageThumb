<?php
    /**
     * Created by PhpStorm.
     * User: cedric
     * Date: 14/05/2016
     * Time: 19:06
     */

    namespace WebinoImageThumb\Service;


    /**
     * Class ImageThumbTrait
     *
     * Use this trait in controllers to inject ImageThumb service from a factory
     *
     * @package WebinoImageThumb\Service
     */
    trait ImageThumbTrait
    {
        /* @var ImageThumb */
        protected $thumbnailer;

        /**
         * @return ImageThumb
         */
        public function getThumbnailer()
        {
            return $this->thumbnailer;
        }

        /**
         * @param ImageThumb $thumbnailer
         *
         * @return $this
         */
        public function setThumbnailer(ImageThumb $thumbnailer)
        {
            $this->thumbnailer = $thumbnailer;

            return $this;
        }
    }