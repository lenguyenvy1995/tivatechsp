
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 my-auto">
            @if (!empty($image))
                <div class="text-center mb-4">
                    <img src="{{ RvMedia::getImageUrl($image) }}" alt="FAQ Image" class="img-fluid rounded">
                </div>
            @endif
        </div>
        <div class="col-lg-8">
            @if (!empty($subtitle))
            <p class="text-start fw-bold fs-5 mb-0">{{ $subtitle }}</p>
        @endif
            @if (!empty($title))
                <h2 class="text-start mb-3">{{ $title }}</h2>
            @endif

            <div class="accordion" id="faqAccordion">
                @foreach ($categories as $catIndex => $category)
                    @foreach ($category->faqs as $index => $faq)
                        <div class="accordion-item mb-3 border-0">
                            <h3 class="accordion-header" id="heading-{{ $catIndex }}-{{ $index }}">
                                <button class="accordion-button @if ($loop->index !== 0) collapsed @endif rounded-3 text-white fw-bold px-4 py-3"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $catIndex }}-{{ $index }}"
                                        aria-expanded="{{ $loop->index === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse-{{ $catIndex }}-{{ $index }}"
                                        style="background-color: var(--primary-color);">
                                    {{ $faq->question }}
                                </button>
                            </h3>
                            <div id="collapse-{{ $catIndex }}-{{ $index }}"
                                 class="accordion-collapse collapse @if ($loop->index === 0) show @endif"
                                 aria-labelledby="heading-{{ $catIndex }}-{{ $index }}"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body bg-light p-4 rounded-bottom">
                                    {!! BaseHelper::clean($faq->answer) !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>

        </div>
    </div>
</div>