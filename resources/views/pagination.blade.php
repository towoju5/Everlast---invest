<style>
      #container {
        padding-top: 20px;
      }
    
      #pagination {
        display: flex;
        justify-content: center;
      }
    
      .blocks {
        width: 40px;
        line-height: 40px;
        text-align: center;
        border: 1px solid #DDDDDD;
        display: inline-block;
        text-decoration: none;
        color: black;
      }
    
      .blocks:not(:first-child) {
        margin-left: 5px;
      }
    
      .blocks:first-child {
        border-radius: 10px 0 0 10px;
      }
    
      .blocks:last-child {
        border-radius: 0 10px 10px 0;
      }
    
      .blocks:hover {
        background-color: #DDDDDD;
      }
    
      #pagination a.active {
        background-color: #4CAF50;
      }
    </style>
    <div id="container">
      <div id="pagination">
        @if ($paginator->hasPages())
        <a href="#" class="blocks disabled">&laquo;</a>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="blocks disabled">&laquo;</a>
        @endif
    
        @foreach ($elements as $element)
          @if (is_string($element))
          <a href="{{ $element }}" class="blocks disabled">1</a>
          @endif
          @if (is_array($element))
            @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
                <a href="#!" class="blocks disabled active">{{ $page }}</a>
              @else
                <a href="{{ $url }}" class="blocks">{{ $page }}</a>
              @endif
            @endforeach
          @endif
        @endforeach
    
        @if ($paginator->hasMorePages())
          <!--<a href="{{ $url }}" class="blocks">{{ $page }}</a>-->
          <a href="{{ $paginator->nextPageUrl() }}" class="blocks">&raquo;</a>
        @else
          <a href="#!" class="blocks">&raquo;</a>
        @endif
      </div>
    </div>