var List = (function(){
    this.head   = null;
    this.tail   = null;
    this.length = 0;

    // 데이터를 담을 노드
    function Node(value){
        this.data           = value;
        this.next           = null;
        this.prev           = null;

        this.topLength      = 0;
        this.bottomLength   = 0;

        this.top            = null;
        this.topTail        = null;

        this.bottom         = null;
        this.bottomTail     = null;

    }
    // 맨 뒤에 데이터 추가
    List.prototype.addLast = function(value){
        var node = new Node(value);
        var current = this.head;
        if(!current){
            this.head = node;
            this.tail = node;
            ++this.length;
        }else{
            this.tail.next = node;
            node.prev = this.tail;
            this.tail = node;
            ++this.length;
        }
    }

    // 맨 앞에 데이터 추가
    List.prototype.addFirst = function(value){
        var node = new Node(value);
        var current = this.head;
        if(!current){
            this.head = node;
            this.tail = node;
            ++this.length;
        }else{
            this.head.prev = node;
            node.next = this.head;
            this.head = node;
            ++this.length;
        }
    }
    // 인덱스에 있는 노드의 탑에 데이터 추가
    List.prototype.addTop = function(idx, value){
        var node = new Node(value);
        var current = this.getIndex(idx, true);
        var prev = this.getIndex(idx-1, true);
        if(idx<=0) prev = false;
        var next = this.getIndex(idx+1, true);
        
        if(!current.top){
            current.top         = node;
            current.top.bottom  = current;
            current.topTail     = node;
            current.topLength++;
        }else{
            current.topTail.top = node;
            node.bottom = current.topTail;
            current.topTail = node;
            current.topLength++;
        }
        var cnt=0;
        if(next){
            if(current.topLength < next.topLength) cnt = current.topLength;
            else cnt = next.topLength;
            for(var i = 1; i<=cnt;++i){
                this.getTopIndex(idx+1,i).prev = this.getTopIndex(idx, i);
                this.getTopIndex(idx, i).next = this.getTopIndex(idx+1,i);
            }
        }
        if(prev){
            if(current.topLength < prev.topLength) cnt = current.topLength;
            else cnt = prev.topLength;
            for(var i = 1; i<=cnt;++i){
                this.getTopIndex(idx-1,i).next = this.getTopIndex(idx, i);
                this.getTopIndex(idx, i).prev = this.getTopIndex(idx-1,i);
            }
        }

    }

    // 인덱스에 있는 노드의 바텀에 데이터 추가
    List.prototype.addBottom = function(idx, value){
        var node = new Node(value);
        var current = this.getIndex(idx, true);
        var prev = this.getIndex(idx-1, true);
        if(idx<=0) prev = false;
        var next = this.getIndex(idx+1, true);
        if(!current.bottom){
            current.bottom = node;
            current.bottom.top = current;
            current.bottomTail = node;
            current.bottomLength++;
        }else{
            current.bottomTail.bottom = node;
            node.top = current.bottomTail;
            current.bottomTail = node;
            current.bottomLength++;
        }
        var cnt=0;
        if(next){
            if(current.bottomLength < next.bottomLength) cnt = current.bottomLength;
            else cnt = next.bottomLength;
            for(var i = 1; i<=cnt;++i){
                this.getBottomIndex(idx+1,i).prev = this.getBottomIndex(idx, i);
                this.getBottomIndex(idx, i).next = this.getBottomIndex(idx+1,i);
            }
        }
        if(prev){
            if(current.bottomLength < prev.bottomLength) cnt = current.bottomLength;
            else cnt = prev.bottomLength;
            for(var i = 1; i<=cnt;++i){
                this.getBottomIndex(idx-1,i).next = this.getBottomIndex(idx, i);
                this.getBottomIndex(idx, i).prev = this.getBottomIndex(idx-1,i);
            }
        }
    }

    // 인덱스 찾기 order 값이 true이면 앞에서부터 false 이면 뒤에서부터
    List.prototype.getIndex = function(idx, order){
        var current;
        var cnt = 0;
        if(order){
            current = this.head;
            while(cnt < idx){
                if(current.next){
                    current = current.next;
                    cnt++;
                }else{
                    return false;
                }
                
            }
            return current;
        }else{
            current = this.tail;
            while(cnt<idx){
                current = current.prev;
                cnt++;
            }
            return current;
        }
    }
    List.prototype.getTopIndex = function(idx, position){
        var current = this.getIndex(idx, true);
        var cnt = 0;
        while(cnt < position){
            current = current.top;
            cnt++;
        }
        return current;
    }
    List.prototype.getBottomIndex = function(idx, position){
        var current = this.getIndex(idx, true);
        var cnt = 0;
        while(cnt < position){
            current = current.bottom;
            cnt++;
        }
        return current;
    }
});