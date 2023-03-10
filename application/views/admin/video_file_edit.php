<style>
.tab-content {
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
}
</style>
<div class="card">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <a class="btn btn-sm btn-primary waves-effect mb-20" href="<?php echo base_url('admin/file_and_download/') . $video_file_info->videos_id; ?>"> <span class="btn-label"><i class="fa fa-arrow-left"></i></span><?php echo trans('back_to_list'); ?></a>
<br><br>
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo trans('edit_episode') ?></h3>
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart(base_url('admin/movie_file_update/'.$video_file_info->video_file_id)); ?>           
              <input type="hidden" name="videos_id" value="<?php echo $video_file_info->videos_id; ?>">
              <div class="form-group">
                <label class="control-label"><?php echo trans('label') ?></label>&nbsp;&nbsp;<input id="label" type="text" value="<?php echo $video_file_info->label; ?>" name="label" class="form-control" placeholder="Episode-1" required="">
              </div>
              <div class="form-group">
                <label class="control-label"><?php echo trans('order'); ?></label>
                <input type="number" name="order" class="form-control" value="<?php echo $video_file_info->order; ?>" placeholder="0 to 9999" required>
              </div>
              <div class="form-group">
                <label class="control-label"><?php echo trans('source'); ?></label>
                <select class="form-control" name="source" id="selected-source">
                  <option value="upload" <?php if($video_file_info->file_source =='upload'): echo 'selected'; endif;?>>Upload</option>
                   <option value="youtube" <?php if($video_file_info->file_source =='youtube'): echo 'selected'; endif;?>>YouTube</option>
                  <option value="vimeo" <?php if($video_file_info->file_source =='vimeo'): echo 'selected'; endif;?>>Vimeo</option>
                  <option value="amazone" <?php if($video_file_info->file_source =='amazone'): echo 'selected'; endif;?>>Amazon S3</option>
                  <option value="mp4" <?php if($video_file_info->file_source =='mp4'): echo 'selected'; endif;?>>MP4 From URL</option>
                  <option value="mkv" <?php if($video_file_info->file_source =='mkv'): echo 'selected'; endif;?>>MKV From URL</option>
                  <option value="webm" <?php if($video_file_info->file_source =='webm'): echo 'selected'; endif;?>>WebM From URL</option>
                  <option value="m3u8" <?php if($video_file_info->file_source =='m3u8'): echo 'selected'; endif;?>>M3U8 From URL</option>
                    <option value="embed" <?php if($video_file_info->file_source =='embed'): echo 'selected'; endif;?>>Embed URL</option>
                    <option value="dailymotion" <?php if($video_file_info->file_source =='dailymotion'): echo 'selected'; endif;?>>Daily Motion</option>
                    <option value="dropbox" <?php if($video_file_info->file_source =='dropbox'): echo 'selected'; endif;?>>Dropbox</option>
                    <option value="tubitv" <?php if($video_file_info->file_source =='tubitv'): echo 'selected'; endif;?>>Tubi TV</option>
                  </select>
              </div>
              <div class="form-group" <?php if($video_file_info->file_source =='upload'): echo 'style="display:none;"'; endif;?> id="url-input">
                <label class="control-label">URL</label>
                <input type="text" name="url" id="url-input-field" class="form-control" value="<?php echo $video_file_info->file_url; ?>" placeholder="http://server-2.com/movies/titalic.mp4" <?php if($video_file_info->file_source !='upload'): echo 'required'; endif;?> ><br>
              </div>
              <div class="form-group" <?php if($video_file_info->file_source !='upload'): echo 'style="display:none;"'; endif;?> id="image-input">
                <label class="control-label"><?php echo trans('select_video'); ?></label>
                <input class="videoselect" name="videofile" id="image-input-field" type="file" accept="video/*" <?php if($video_file_info->file_source =='upload'): echo 'required'; endif;?> />
              </div>
              <div class="form-group">
                <button class="btn btn-sm btn-primary waves-effect" type="submit"> <span class="btn-label"><i class="fa fa-plus"></i></span><?php echo trans('save_changes') ?> </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>
    <script>
      jQuery(document).ready(function() {
          $('form').parsley();
          $(".videoselect").filestyle({
              input: true,
              icon: true,
              buttonBefore: true,
              text: "<?php echo trans('select_video'); ?>",
              htmlIcon: '<span class="fa fa-file-video-o"></span>',
              badge: true,
              badgeName: "badge-danger"
          });

          $( "#selected-source" ).change(function() {
             var source = $("#selected-source option:selected" ).val();
             if(source == 'upload'){
               $("#image-input").show('slow');
               $("#url-input").hide('slow');
               $("#image-input-field").attr("required", true);
               $("#url-input-field").attr("required", false);
             }else{
               $("#image-input").hide('slow');
               $("#url-input").show('slow');
               $("#image-input-field").attr("required", false);
               $("#url-input-field").attr("required", true);
             }
          });
      });
    </script>