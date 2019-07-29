<?php

namespace DevDesigns\AcfCourseListBlock;



/**
 * Register course list block.
 *
 * @since 1.3.0
 */
add_action( 'acf/init', function (): void {
	acf_register_block_type( [
		'name'            => 'course-list',
		'title'           => __( 'Course List', 'acf-course-list-block' ),
		'description'     => __( 'A custom block to display video courses.', 'acf-course-list-block' ),
		'category'        => 'formatting',
		'icon'            => 'images-alt2',
		'align'           => 'full',
		'enqueue_assets'  => function () {
			wp_enqueue_style( 'dashicons' );
			wp_enqueue_style( 'acf-course-list-block/main.css', ACF_COURSE_LIST_BLOCK_URL . '/dist/styles/main.css', [], ACF_COURSE_LIST_BLOCK_VERSION );
			wp_enqueue_script( 'acf-course-list-block/main.js', ACF_COURSE_LIST_BLOCK_URL . '/dist/scripts/main.js', [], ACF_COURSE_LIST_BLOCK_VERSION, true );
		},
		'render_callback' => function ( $block ) {
			$id = 'course-list-' . $block['id'];
			$className = 'course-list';
			$courses = get_field( 'course_list' );

			if ( ! empty( $block['anchor'] ) ) {
				$id = $block['anchor'];
			}

			if ( ! empty( $block['className'] ) ) {
				$className .= ' ' . $block['className'];
			}

			if ( ! empty( $block['align'] ) ) {
				$className .= ' align' . $block['align'];
			} ?>

			<?php if ( $courses ) : ?>
				<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
					<?php foreach ( $courses as $module ) : ?>
						<?php if ( $module ) : ?>
							<div class="course-module">
								<?php foreach ( $module as [ 'heading' => $heading, 'course' => $course ] ) : ?>
									<?php if ( $heading ) : ?>
										<header>
											<h2><?php echo __( $heading, 'acf-course-list-block' ) ?></h2>
										</header>
									<?php endif; ?>

									<?php if ( $course ) : ?>
										<div class="courses">
											<?php foreach ( $course as $index => ['title' => $title, 'length' => $length, 'icon' => $icon, 'link' => $link ] ) : ?>
												<?php
													$icon = $icon['value'] ?? '';
													$icon = $icon ? sprintf( '<span class="dashicons %s"></span>', $icon ) : '';

													++ $index;
													$lesson = "Lesson {$index}: ";
													$length = "  ({$length})";
													$video = $icon . $lesson . $title . $length;

													[ 'title' => $linkTitle, 'url' => $url, 'target' => $target ] = $link;

													$linkTitle = $linkTitle ?: $title;
													$target = $target ?: '_self';
												?>

												<?php if ( $title ) : ?>
													<div class="course">
														<h3>
															<?php if ( $url ) : ?>
																<a href="<?php echo $url ?>" title="<?php echo $linkTitle ?>" target="<?php echo $target ?>">
																	<?php echo __( $video, 'acf-course-list-block' ) ?>
																</a>
															<?php else : ?>
																<?php echo __( $video, 'acf-course-list-block' ) ?>
															<?php endif; ?>
														</h3>
													</div>
												<?php endif; ?>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php
		}
	] );
} );
