<?php get_header(); ?>
<div class="content-area">
    <main>
        <section class="middle-area">
            <div class="container">
                <div class="row">
                    <aside class="sidebar">
                        Barra lateral
                    </aside>
                    <div class="articles-grid">
                        <div class="destaque">
                            <?php
                            // Loop para exibir os posts
                            if (have_posts()) :
                                // Exibir o último post como destaque
                                $latest_post = true;
                                while (have_posts()) : the_post();
                                    if ($latest_post) :
                                        $latest_post = false;
                            ?>
                                        <article>
                                            <h2><?php the_title() ?></h2>
                                            <?php the_post_thumbnail() ?>
                                            <p>Publicado em: <?php echo get_the_date() ?></p>
                                            <p>Por: <?php the_author_posts_link() ?></p>
                                            <p>Categorias: <?php the_category('') ?></p>
                                            <p><?php the_excerpt() ?></p>
                                        </article>
                                <?php endif;
                                endwhile;
                            else :
                                ?>
                                <p>Nenhum post a ser exibido</p>
                            <?php endif; ?>
                        </div>
                        <?php
                        // Loop para exibir os posts
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                // Verifica se o post atual não é o post de destaque
                        ?>
                                <article>
                                    <h2><?php the_title() ?></h2>
                                    <?php the_post_thumbnail() ?>
                                    <p>Publicado em: <?php echo get_the_date() ?></p>
                                    <p>Por: <?php the_author_posts_link() ?></p>
                                    <p>Categorias: <?php the_category('') ?></p>
                                    <p><?php the_excerpt() ?></p>
                                </article>
                            <?php
                            endwhile;
                        else :
                            ?>
                            <p>Nenhum post a ser exibido</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>