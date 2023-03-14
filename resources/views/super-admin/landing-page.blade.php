@extends('super-admin.office')
@section('content')


    <form novalidate="novalidate" method="post" action="{{route('super-admin.save-post')}}" id="form-post" data-form="{{$base_url}}/super-admin/landing-page" data-btn-id="btn-save-post">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 mb-0 text-gray-800">{{__('Landing Page')}}</h1>
            <button type="submit" id="btn-save-post" class="btn btn-primary">{{__('Save')}}</button>
        </div>

        <div class="mb-3">
            <label for="post-title" class="form-label">{{__('Title')}}</label>
            <input type="text" class="form-control" name="title" id="post-title" required value="{{$post->title ?? ''}}">
        </div>

        <h4>{{__('Sections')}}</h4>


        <div class="card mb-3">
            <div class="card-body">
                <h5>{{__('Hero')}}</h5>
                <div class="row">
                    <div  class="col-md-6">

                        <div class="mb-3">
                            <label for="section-name" class="form-label">{{__('Section Name')}}</label>
                            <input type="text" class="form-control" name="settings[hero_section_name]" id="section-name" value="{{$post->settings['hero_section_name'] ?? ''}}">
                        </div>

                        <div class="mb-3">
                            <label for="hero-title" class="form-label">{{__('Title')}}</label>
                            <input type="text" class="form-control" name="settings[hero_title]" id="hero-title" value="{{$post->settings['hero_title'] ?? ''}}">
                        </div>

                        <div class="mb-3">
                            <label for="hero-subtitle" class="form-label">{{__('Subtitle')}}</label>
                            <textarea class="form-control" name="settings[hero_subtitle]" id="hero-subtitle">{{$post->settings['hero_subtitle'] ?? ''}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="hero-button-text" class="form-label">{{__('Button Text')}}</label>
                            <input type="text" class="form-control" name="settings[hero_button_text]" id="hero-button-text" value="{{$post->settings['hero_button_text'] ?? ''}}">
                        </div>

                        <div class="mb-3">
                            <label for="hero-button-url" class="form-label">{{__('Button URL')}}</label>
                            <input type="text" class="form-control" name="settings[hero_button_url]" id="hero-button-url" value="{{$post->settings['hero_button_url'] ?? ''}}">
                        </div>

                    </div>
                    <div  class="col-md-6">

                        <div class="mb-3">
                            <label for="hero-image" class="form-label">{{__('Hero Image')}}</label>
                            <select class="form-select" name="settings[hero_image]" id="hero-image">
                                <option value="">{{__('Select Image')}}</option>
                                @foreach($images as $image)
                                    <option value="{{$image->path}}" {{($post->settings['hero_image'] ?? '') == $image->path ? 'selected' : ''}}>{{$image->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        @if(!empty($post->settings['hero_image']))
                            <div class="mb-3">
                                <img src="{{config('app.url')}}/uploads/{{$post->settings['hero_image']}}" class="img-fluid">
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5>{{__('Signup')}}</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="signup-section-name" class="form-label">{{__('Section Name')}}</label>
                            <input type="text" class="form-control" name="settings[signup_section_name]" id="signup-section-name" value="{{$post->settings['signup_section_name'] ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="signup-title" class="form-label">{{__('Title')}}</label>
                            <input type="text" class="form-control" name="settings[signup_title]" id="signup-title" value="{{$post->settings['signup_title'] ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="signup-subtitle" class="form-label">{{__('Subtitle')}}</label>
                            <textarea class="form-control" name="settings[signup_subtitle]" id="signup-subtitle">{{$post->settings['signup_subtitle'] ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>{{__('Reasons')}}</h6>

                        <button class="btn btn-primary mb-3" id="add-signup-reason" type="button"><i class="bi bi-plus-lg"></i></button>

                        <div id="signup-reasons">

                            @if(!empty($post->settings['signup_reasons']))
                                @foreach($post->settings['signup_reasons'] as $reason)
                                    <div class="row signup-reason">
                                        <div class="col-md-9">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="settings[signup_reasons][]" value="{{$reason}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <button class="btn btn-primary ms-2 mb-3 remove-reason" type="button"><i class="bi bi-dash-lg"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5>{{__('Feature Highlights')}}</h5>

                <div class="row">
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="feature-highlight-section-name" class="form-label">{{__('Section Name')}}</label>
                            <input type="text" class="form-control" name="settings[feature_highlight_section_name]" id="feature-highlight-section-name" value="{{$post->settings['feature_highlight_section_name'] ?? ''}}">
                        </div>

                        <div class="mb-3">
                            <label for="feature-highlight-title" class="form-label">{{__('Title')}}</label>
                            <input type="text" class="form-control" name="settings[feature_highlight_title]" id="feature-highlight-title" value="{{$post->settings['feature_highlight_title'] ?? ''}}">
                        </div>

                        <div class="mb-3">
                            <label for="feature-highlight-subtitle" class="form-label">{{__('Subtitle')}}</label>
                            <textarea class="form-control" name="settings[feature_highlight_subtitle]" id="feature-highlight-subtitle">{{$post->settings['feature_highlight_subtitle'] ?? ''}}</textarea>
                        </div>



                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="feature-highlight-feature-1-title" class="form-label">{{__('Feature 1 Title')}}</label>
                            <input type="text" class="form-control" name="settings[feature_highlight_feature_1_title]" id="feature-highlight-feature-1-title" value="{{$post->settings['feature_highlight_feature_1_title'] ?? ''}}">
                        </div>

                        <div class="mb-3">
                            <label for="feature-highlight-feature-1-subtitle" class="form-label">{{__('Feature 1 Subtitle')}}</label>
                            <textarea class="form-control" name="settings[feature_highlight_feature_1_subtitle]" id="feature-highlight-feature-1-subtitle">{{$post->settings['feature_highlight_feature_1_subtitle'] ?? ''}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="feature-highlight-feature-1-icon" class="form-label">{{__('Feature 1 Icon SVG')}}</label>
                            <textarea class="form-control" name="settings[feature_highlight_feature_1_icon]" id="feature-highlight-feature-1-icon">{{$post->settings['feature_highlight_feature_1_icon'] ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="feature-highlight-feature-2-title" class="form-label">{{__('Feature 2 Title')}}</label>
                            <input type="text" class="form-control" name="settings[feature_highlight_feature_2_title]" id="feature-highlight-feature-2-title" value="{{$post->settings['feature_highlight_feature_2_title'] ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="feature-highlight-feature-2-subtitle" class="form-label">{{__('Feature 2 Subtitle')}}</label>
                            <textarea class="form-control" name="settings[feature_highlight_feature_2_subtitle]" id="feature-highlight-feature-2-subtitle">{{$post->settings['feature_highlight_feature_2_subtitle'] ?? ''}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="feature-highlight-feature-2-icon" class="form-label">{{__('Feature 2 Icon SVG')}}</label>
                            <textarea class="form-control" name="settings[feature_highlight_feature_2_icon]" id="feature-highlight-feature-2-icon">{{$post->settings['feature_highlight_feature_2_icon'] ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="feature-highlight-feature-3-title" class="form-label">{{__('Feature 3 Title')}}</label>
                            <input type="text" class="form-control" name="settings[feature_highlight_feature_3_title]" id="feature-highlight-feature-3-title" value="{{$post->settings['feature_highlight_feature_3_title'] ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="feature-highlight-feature-3-subtitle" class="form-label">{{__('Feature 3 Subtitle')}}</label>
                            <textarea class="form-control" name="settings[feature_highlight_feature_3_subtitle]" id="feature-highlight-feature-3-subtitle">{{$post->settings['feature_highlight_feature_3_subtitle'] ?? ''}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="feature-highlight-feature-3-icon" class="form-label">{{__('Feature 3 Icon SVG')}}</label>
                            <textarea class="form-control" name="settings[feature_highlight_feature_3_icon]" id="feature-highlight-feature-3-icon">{{$post->settings['feature_highlight_feature_3_icon'] ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="feature-highlight-feature-4-title" class="form-label">{{__('Feature 4 Title')}}</label>
                            <input type="text" class="form-control" name="settings[feature_highlight_feature_4_title]" id="feature-highlight-feature-4-title" value="{{$post->settings['feature_highlight_feature_4_title'] ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="feature-highlight-feature-4-subtitle" class="form-label">{{__('Feature 4 Subtitle')}}</label>
                            <textarea class="form-control" name="settings[feature_highlight_feature_4_subtitle]" id="feature-highlight-feature-4-subtitle">{{$post->settings['feature_highlight_feature_4_subtitle'] ?? ''}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="feature-highlight-feature-4-icon" class="form-label">{{__('Feature 4 Icon SVG')}}</label>
                            <textarea class="form-control" name="settings[feature_highlight_feature_4_icon]" id="feature-highlight-feature-4-icon">{{$post->settings['feature_highlight_feature_4_icon'] ?? ''}}</textarea>
                        </div>
                    </div>
                </div>

                <a href="https://heroicons.com/" target="_blank" class="mt-4">{{__('You can copy SVG icon from HeroIcons')}}</a>

            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5>{{$post->settings['about_section_name'] ?? __('About')}}</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="about-section-name" class="form-label">{{__('Section Name')}}</label>
                            <input type="text" class="form-control" name="settings[about_section_name]" id="about-section-name" value="{{$post->settings['about_section_name'] ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="about-section-title" class="form-label">{{__('Section Title')}}</label>
                            <input type="text" class="form-control" name="settings[about_section_title]" id="about-section-title" value="{{$post->settings['about_section_title'] ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="about-section-subtitle" class="form-label">{{__('Section Subtitle')}}</label>
                            <textarea class="form-control" rows="10" name="settings[about_section_subtitle]" id="about-section-subtitle">{{$post->settings['about_section_subtitle'] ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="about-section-image" class="form-label">{{__('Section Image')}}</label>
                            <select class="form-select" name="settings[about_section_image]" id="about-section-image">
                                <option value="">{{__('Select Image')}}</option>
                                @foreach($images as $image)
                                    <option value="{{$image->path}}" @if(($post->settings['about_section_image'] ?? null) == $image->path) selected @endif>{{$image->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(!empty($post->settings['about_section_image']))
                            <div class="mb-3">
                                <img src="{{config('app.url')}}/uploads/{{$post->settings['about_section_image']}}" class="img-fluid">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="card mb-3">
            <div class="card-body">
                <h5>{{$post->settings['pricing_section_name'] ?? __('Pricing')}}</h5>
                <div class="mb-3">
                    <label for="pricing-section-name" class="form-label">{{__('Section Name')}}</label>
                    <input type="text" class="form-control" name="settings[pricing_section_name]" id="pricing-section-name" value="{{$post->settings['pricing_section_name'] ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="pricing-section-title" class="form-label">{{__('Section Title')}}</label>
                    <input type="text" class="form-control" name="settings[pricing_section_title]" id="pricing-section-title" value="{{$post->settings['pricing_section_title'] ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="pricing-section-subtitle" class="form-label">{{__('Section Subtitle')}}</label>
                    <textarea class="form-control" rows="4" name="settings[pricing_section_subtitle]" id="pricing-section-subtitle">{{$post->settings['pricing_section_subtitle'] ?? ''}}</textarea>
                </div>

                <a href="{{$base_url}}/super-admin/subscription-plans">{{__('Manage pricing plans from subscription plans')}}</a>

            </div>
        </div>


        <div class="card mb-3">
            <div class="card-body">
                <h5>{{$post->settings['faq_section_name'] ?? __('FAQ')}}</h5>
                <div class="mb-3">
                    <label for="faq-section-name" class="form-label">{{__('Section Name')}}</label>
                    <input type="text" class="form-control" name="settings[faq_section_name]" id="faq-section-name" value="{{$post->settings['faq_section_name'] ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="faq-section-title" class="form-label">{{__('Section Title')}}</label>
                    <input type="text" class="form-control" name="settings[faq_section_title]" id="faq-section-title" value="{{$post->settings['faq_section_title'] ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="faq-section-subtitle" class="form-label">{{__('Section Subtitle')}}</label>
                    <textarea class="form-control" rows="5" name="settings[faq_section_subtitle]" id="faq-section-subtitle">{{$post->settings['faq_section_subtitle'] ?? ''}}</textarea>
                </div>

                <h6>{{__('Questions and Answers')}}</h6>

                <div class="mb-3">
                    <button type="button" class="btn btn-primary" id="add-faq-question">{{__('Add Question')}}</button>
                </div>

                <div id="faq-questions">
                    @if(!empty($post->settings['faq_questions']))
                        @foreach($post->settings['faq_questions'] as $key => $question)
                            <div class="row faq-question mb-3">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="settings[faq_questions][]" value="{{$question}}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <textarea class="form-control" name="settings[faq_answers][]">{{$post->settings['faq_answers'][$key] ?? ''}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end">
                                    <button class="btn btn-primary mb-3 remove-faq-question" type="button"><i class="bi bi-dash-lg"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5>{{$post->settings['testimonials_section_name'] ?? __('Testimonials')}}</h5>
                <div class="mb-3">
                    <label for="testimonials-section-name" class="form-label">{{__('Section Name')}}</label>
                    <input type="text" class="form-control" name="settings[testimonials_section_name]" id="testimonials-section-name" value="{{$post->settings['testimonials_section_name'] ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="testimonials-section-title" class="form-label">{{__('Section Title')}}</label>
                    <input type="text" class="form-control" name="settings[testimonials_section_title]" id="testimonials-section-title" value="{{$post->settings['testimonials_section_title'] ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="testimonials-section-subtitle" class="form-label">{{__('Section Subtitle')}}</label>
                    <textarea class="form-control" rows="5" name="settings[testimonials_section_subtitle]" id="testimonials-section-subtitle">{{$post->settings['testimonials_section_subtitle'] ?? ''}}</textarea>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary" id="add-testimonial">{{__('Add Testimonial')}}</button>
                </div>

                <div id="testimonials">
                    @if(!empty($post->settings['testimonials']))
                        @foreach($post->settings['testimonials'] as $key => $testimonial)
                            <div class="row testimonial mb-3">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="settings[testimonials_author][]" value="{{$post->settings['testimonials_author'][$key] ?? ''}}">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="settings[testimonials_author_title][]" value="{{$post->settings['testimonials_author_title'][$key] ?? ''}}">
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <textarea class="form-control" name="settings[testimonials][]">{{$testimonial}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end">
                                    <button class="btn btn-primary mb-3 remove-testimonial" type="button"><i class="bi bi-dash-lg"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>

        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h5>{{__('Footer')}}</h5>
                    <div class="mb-3">
                        <label for="footer-business-short-description" class="form-label">{{__('Business Short Description')}}</label>
                        <textarea class="form-control" rows="5" name="settings[footer_business_short_description]" id="footer-business-short-description">{{$post->settings['footer_business_short_description'] ?? ''}}</textarea>
                    </div>
                </div>
            </div>
        </div>


    </form>


@endsection

@section('scripts')
    <script>
        (function(){
            "use strict";
            window.addEventListener('DOMContentLoaded', () => {

                const add_signup_reason = document.getElementById('add-signup-reason');

                const signup_reasons = document.getElementById('signup-reasons');

                add_signup_reason.addEventListener('click', () => {

                    const new_signup_reason = document.createElement('div');
                    new_signup_reason.classList.add('row');
                    new_signup_reason.classList.add('signup-reason');
                    new_signup_reason.innerHTML = `
                        <div class="col-md-9">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="settings[signup_reasons][]">
                                    </div>
                                </div>
                                <div class="col-md-3 text-end">
                                    <button class="btn btn-primary ms-2 mb-3 remove-reason" type="button"><i class="bi bi-dash-lg"></i></button>
                                </div>
                    `;
                    signup_reasons.appendChild(new_signup_reason);
                });


                signup_reasons.addEventListener('click', (e) => {
                    if(e.target.classList.contains('remove-reason') || e.target.closest('.remove-reason')){
                        e.target.closest('.signup-reason').remove();
                    }
                });

                const add_faq_question = document.getElementById('add-faq-question');

                const faq_questions = document.getElementById('faq-questions');

                add_faq_question.addEventListener('click', () => {
                    const new_faq_question = document.createElement('div');
                    new_faq_question.classList.add('row');
                    new_faq_question.classList.add('faq-question');
                    new_faq_question.innerHTML = `
                        <div class="col-md-5">
                                    <div class="mb-3">
                                        <input type="text" placeholder="{{__('Question')}}" class="form-control" name="settings[faq_questions][]">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder={{__('Answer')}} name="settings[faq_answers][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end">
                                    <button class="btn btn-primary mb-3 remove-faq-question" type="button"><i class="bi bi-dash-lg"></i></button>
                                </div>
                    `;
                    faq_questions.appendChild(new_faq_question);
                });

                faq_questions.addEventListener('click', (e) => {
                    if(e.target.classList.contains('remove-faq-question') || e.target.closest('.remove-faq-question')){
                        e.target.closest('.faq-question').remove();
                    }
                });

                const add_testimonial = document.getElementById('add-testimonial');

                const testimonials = document.getElementById('testimonials');

                add_testimonial.addEventListener('click', () => {
                    const new_testimonial = document.createElement('div');
                    new_testimonial.classList.add('row');
                    new_testimonial.classList.add('testimonial');
                    new_testimonial.innerHTML = `
                        <div class="col-md-5">
                                    <div class="mb-3">
                                        <input type="text" placeholder="{{__('Author')}}" class="form-control" name="settings[testimonials_author][]">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" placeholder="{{__('Author Title')}}" class="form-control" name="settings[testimonials_author_title][]">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="{{__('Testimonial')}}" name="settings[testimonials][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end">
                                    <button class="btn btn-primary mb-3 remove-testimonial" type="button"><i class="bi bi-dash-lg"></i></button>
                                </div>
                    `;
                    testimonials.appendChild(new_testimonial);
                });

                testimonials.addEventListener('click', (e) => {
                    if(e.target.classList.contains('remove-testimonial') || e.target.closest('.remove-testimonial')){
                        e.target.closest('.testimonial').remove();
                    }
                });

            });
        })();
    </script>
@endsection
