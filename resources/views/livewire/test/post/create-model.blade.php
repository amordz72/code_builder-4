<div>








    <div x-data="{ count: 0 }">
        <button x-on:click="count++" class="bg-red-200">Increment</button>

        <span x-text="count"></span>
    </div>
  <button type="submit" id='bb'
  class="bg-blue-400"
  onclick="msg()">btn</button>
    <script>
        document.addEventListener('livewire:load', function() {

        })

        function msg() {
            alert('Your JS here.')
        }

    </script>


</div>
