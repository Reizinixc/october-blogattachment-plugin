<?php namespace Reizinixc\BlogAttachment;

use RainLab\Blog\Models\Post as RainLabPost;
use RainLab\Blog\Controllers\Posts as RainLabPosts;
use System\Classes\PluginBase;

/**
 * Blog attachment plugin registration class
 *
 * @package Reizinixc\BlogAttachment
 */
class Plugin extends PluginBase
{
    public $require = ['RainLab.Blog'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Blog Attachment Extension',
            'description' => 'Adds file attachment features to the RainLab Blog module.',
            'author'      => 'Kune Keiseiie',
            'icon'        => 'icon-file',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        // Extend attachment file to the post relation
        RainLabPost::extend(function (\October\Rain\Database\Model $model) {
            $model->attachMany['attachments'] = [\System\Models\File::class];
        });

        RainLabPosts::extendFormFields(function (\Backend\Widgets\Form $form, $model, $context) {
            if (!$model instanceof RainLabPost)
                return;

            // Add attachments to the "Manage" tab
            $form->addSecondaryTabFields([
                'attachments' => [
                    'mode'  => 'file',
                    'label' => 'reizinixc.blogattachment::lang.post.attachments',
                    'tab'   => 'rainlab.blog::lang.post.tab_manage',
                    'type'  => 'fileupload',
                ],
            ]);
        });
    }
}
