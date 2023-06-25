<section class="elementor-section
    elementor-inner-section
    elementor-element
    elementor-element-28d8c90d
    elementor-section-content-middle
    elementor-section-boxed
    elementor-section-height-default
    elementor-section-height-default" data-id="28d8c90d" data-element_type="section">
    <div class="elementor-container
        elementor-column-gap-default">
        <div class="elementor-row">
            <div class="elementor-column
                elementor-col-100
                elementor-inner-column
                elementor-element
                elementor-element-20e7504a" data-id="20e7504a" data-element_type="column"
                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-column-wrap
                    elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element
                            elementor-element-dae0d7e
                            elementor-widget
                            elementor-widget-accordion" data-id="dae0d7e" data-element_type="widget"
                            data-widget_type="accordion.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-accordion" role="tablist">
                                    @foreach ($questions as $question)
                                        <div class="elementor-accordion-item">
                                        <div id="elementor-tab-title-2291" class="elementor-tab-title
                                            elementor-active" data-tab="1" role="tab"
                                            aria-controls="elementor-tab-content-2291" aria-expanded="true" tabindex="0"
                                            aria-selected="true">
                                            <span class="elementor-accordion-icon
                                                elementor-accordion-icon-right" aria-hidden="true">
                                                <span class="elementor-accordion-icon-closed"><i class="fas
                                                        fa-caret-left"></i></span>
                                                <span class="elementor-accordion-icon-opened"><i class="fas
                                                        fa-caret-down"></i></span>
                                            </span>
                                            <a class="elementor-accordion-title" href="{{route('index')}}/">ممكن
                                                {{ $question->question }}   
                                            </a>
                                        </div>
                                        <div id="elementor-tab-content-2291" class="elementor-tab-content
                                            elementor-clearfix
                                            elementor-active" data-tab="1" role="tabpanel"
                                            aria-labelledby="elementor-tab-title-2291" style="display:
                                            block;">
                                            <p>
                                               {{ $question->answer }} 
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>