<x-layouts.app>
  <section class="section" id="create" >
    <div class="container" id="createpost">
      <div class="title is-2 ">Create New Post</div>
      <form action="{{ route('posts.store') }}" method="POST" class="form" >
        @csrf
        <div class="field">
          <label class="label">Title</label>
          <div class="control">
            <input class="input @error('title')is-danger @enderror is-normal" name="title" type="text" value="{{ old('title') }}" placeholder="Post Title">
          </div>
          @error('title')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label class="label">Content</label>
          <div class="control">
            <textarea class="textarea @error('content')is-danger @enderror is-small" name="content" placeholder="Post Content">{{ old('content') }}</textarea>
          </div>
          @error('content')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label">Featured Image (URL)</label>
          <div class="control">
            <input class="input @error('featured_image')is-danger @enderror" name="featured_image" type="text" value="{{ old('featured_image') }}" placeholder="http://hi.com/pic.jpg">
          </div>
          @error('featured_image')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label">Category</label>
          <div class="control" id="category">
            <div class="select @error('category_id')is-danger @enderror">
              <select name="category_id" value="{{ old('category_id') }}">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @error('category_id')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label class="label">Tags</label>
          <div class="control" id="tag">
            <div class="select is-multiple @error('tags')is-danger @enderror">
              <select name="tags[]" value="{{ old('tags') }}" multiple>
                @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @error('tags')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class=" is-link">Create</button>
          </div>
          <div class="control">
            <button class=" is-link is-light">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>

</x-layouts.app>
