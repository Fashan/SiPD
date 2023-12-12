<div class="container mt-3">
  <div class="row">


    <div class="col-md-8">
      <div class="card text-center">
      <div class="card-body">
         <h1 class="text-capitalize mb-3"><?= $post->post_title; ?></h1>
          <hr class="my-3">
           <?php if ($post->post_thumbnail) : ?>
          <img src="<?= base_url('assets/images/posts/') . $post->post_thumbnail ?>" class="img-fluid mb-2" Style="width: 100%;height: 80vh;">
    <?php endif; ?>
    <?= $post->post_body; ?>
        </div>
        </div>
    </div>


    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12">
          <div class="card" style="width: 20rem;">
         <div class="card-header">
           Recent Post
         </div>
          <ul class="list-group list-group-flush zoom">
       <?php foreach ($recent_posts as $rp) : ?>
            <a href="<?= base_url('post/view/') . $rp->post_slug; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1"><?= $rp->post_title; ?></h5>
                        <span class="small text-secondary">
                            <svg style="height: 16px" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="5" width="16" height="16" rx="2" />
                                <line x1="16" y1="3" x2="16" y2="7" />
                                <line x1="8" y1="3" x2="8" y2="7" />
                                <line x1="4" y1="11" x2="20" y2="11" />
                                <rect x="8" y="15" width="2" height="2" />
                            </svg>
                            <?= custom_date('d M Y', $rp->post_date); ?>
                            <svg style="height: 16px" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4" />
                                <circle cx="9" cy="9" r="2" />
                            </svg>
                            <?= $rp->category_name; ?>
                        </span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
        
  </ul>
         </div>
        </div>
        <div class="col-md-12 mt-3">
           <div class="card" style="width: 20rem;">
         <div class="card-header">
           Recent Comment
         </div>
          <ul class="list-group list-group-flush zoom">
    <?php foreach ($recent_comments as $rc) : ?>
            <a href="<?= base_url('post/view/') . $rc->post_slug . '#c' . $rc->comment_id; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">"<?= $rc->comment_body; ?>"</h5>
                        <span class="small text-secondary">
                            <span class="avatar avatar-xs bg-blue-lt rounded-circle" style="background-image: url(...)">IT</span>
                            <b><?= $rc->username; ?></b> on <b><?= custom_date('d F Y', $rc->comment_date); ?></b>
                        </span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
  </ul>
         </div>
        </div>
      </div>
    </div>


  </div>

  <div class="row mt-3">
    <div class="col-md-8">
       <?php $this->load->view('comment/box'); ?>
    </div>
  </div>
</div>

